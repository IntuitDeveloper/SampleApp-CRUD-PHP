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

// Add a purchase
$addPurchase = $dataService->Add(PurchaseHelper::getPurchaseFields($dataService));
echo "Purchase created :::  TxnDate ::: {$addPurchase->TxnDate} \n";

//sparse update purchase
date_default_timezone_set('UTC');
$addPurchase->TxnDate = date('Y-m-d', time() + 2*(24*60*60));
$addPurchase->sparse = 'true';
$savedPurchase = $dataService->Update($addPurchase);
echo "Purchase sparse updated :::  TxnDate ::: {$savedPurchase->TxnDate} \n";


// update purchase with all fields
$updatedPurchase = PurchaseHelper::getPurchaseFields($dataService);
$updatedPurchase->Id = $savedPurchase->Id;
$updatedPurchase->SyncToken = $savedPurchase->SyncToken;
$savedPurchase = $dataService->Update($updatedPurchase);
echo "Purchase updated with all fields :::  TxnDate ::: {$savedPurchase->TxnDate} \n";

?>
