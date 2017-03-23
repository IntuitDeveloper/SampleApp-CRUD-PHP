<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/DepositHelper.php'); 

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

// Add a deposit
$addDeposit = $dataService->Add(DepositHelper::getDepositFields($dataService));
echo "Deposit created :::  TxnDate ::: {$addDeposit->TxnDate} \n";

//sparse update deposit
date_default_timezone_set('UTC');
$addDeposit->TxnDate = date('Y-m-d', time() + 2*(24*60*60));
$addDeposit->sparse = 'true';
$savedDeposit = $dataService->Update($addDeposit);
echo "Deposit sparse updated :::  TxnDate ::: {$savedDeposit->TxnDate} \n";


// update deposit with all fields
$updatedDeposit = DepositHelper::getDepositFields($dataService);
$updatedDeposit->Id = $savedDeposit->Id;
$updatedDeposit->SyncToken = $savedDeposit->SyncToken;
$savedDeposit = $dataService->Update($updatedDeposit);
echo "Deposit updated with all fields :::  TxnDate ::: {$savedDeposit->TxnDate} \n";

?>
