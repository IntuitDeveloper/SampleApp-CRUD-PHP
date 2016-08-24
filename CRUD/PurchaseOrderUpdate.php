<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/PurchaseHelper.php'); 

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

// Add a purchaseOrder
$addPurchaseOrder = $dataService->Add(PurchaseHelper::getPurchaseOrderFields($dataService));
echo "PurchaseOrder created :::  TxnDate ::: {$addPurchaseOrder->TxnDate} \n";

//sparse update purchaseOrder
date_default_timezone_set('UTC');
$addPurchaseOrder->TxnDate = date('Y-m-d', time() + 2*(24*60*60));
$addPurchaseOrder->sparse = 'true';
$savedPurchaseOrder = $dataService->Update($addPurchaseOrder);
echo "PurchaseOrder sparse updated :::  TxnDate ::: {$savedPurchaseOrder->TxnDate} \n";


// update purchaseOrder with all fields
$updatedPurchaseOrder = PurchaseHelper::getPurchaseOrderFields($dataService);
$updatedPurchaseOrder->Id = $savedPurchaseOrder->Id;
$updatedPurchaseOrder->SyncToken = $savedPurchaseOrder->SyncToken;
$savedPurchaseOrder = $dataService->Update($updatedPurchaseOrder);
echo "PurchaseOrder updated with all fields :::  TxnDate ::: {$savedPurchaseOrder->TxnDate} \n";

?>
