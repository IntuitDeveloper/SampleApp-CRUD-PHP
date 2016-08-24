<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/BillHelper.php'); 

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

// Add a billPayment
$addBillPayment = $dataService->Add(BillHelper::getBillPaymentFields($dataService));
echo "BillPayment created :::  TotalAmt ::: {$addBillPayment->TotalAmt} \n";

//sparse update billPayment
$addBillPayment->TotalAmt = 33;
$addBillPayment->sparse = 'true';
$savedBillPayment = $dataService->Update($addBillPayment);
echo "BillPayment sparse updated :::  TotalAmt ::: {$savedBillPayment->TotalAmt} \n";


// update billPayment with all fields
$updatedBillPayment = BillHelper::getBillPaymentFields($dataService);
$updatedBillPayment->Id = $savedBillPayment->Id;
$updatedBillPayment->SyncToken = $savedBillPayment->SyncToken;
$savedBillPayment = $dataService->Update($updatedBillPayment);
echo "BillPayment updated with all fields :::  TotalAmt ::: {$savedBillPayment->TotalAmt} \n";

?>
