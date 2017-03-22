<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/CreditMemoHelper.php'); 

//Specify QBO or QBD
$serviceType = IntuitServicesType::QBO;

// Get App Config
$realmId = ConfigurationManager::AppSettings('RealmID');
if (!$realmId)
	exit("Please add realm to App.Config before running this sample.\n");

// Prep Service Context
$requestValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessToken'),
                                              ConfigurationManager::AppSettings('AccessTokenSecret'),
                                              ConfigurationManager::AppSettings('ConsumerKey'),
                                              ConfigurationManager::AppSettings('ConsumerSecret'));
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext)
	exit("Problem while initializing ServiceContext.\n");

// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
	exit("Problem while initializing DataService.\n");

// Add a creditMemo
$addCreditMemo = $dataService->Add(CreditMemoHelper::getCreditMemoFields($dataService));
echo "CreditMemo created :::  name ::: {$addCreditMemo->DocNumber} \n";

//sparse update creditMemo
$addCreditMemo->DocNumber = rand(0,999);
$addCreditMemo->sparse = 'true';
$savedCreditMemo = $dataService->Update($addCreditMemo);
echo "CreditMemo sparse updated :::  DocNumber ::: {$savedCreditMemo->DocNumber} \n";


// update creditMemo with all fields
$updatedCreditMemo = CreditMemoHelper::getCreditMemoFields($dataService);
$updatedCreditMemo->Id = $savedCreditMemo->Id;
$updatedCreditMemo->SyncToken = $savedCreditMemo->SyncToken;
$savedCreditMemo = $dataService->Update($updatedCreditMemo);
echo "CreditMemo updated with all fields :::  DocNumber ::: {$savedCreditMemo->DocNumber} \n";

?>
