<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/TransferHelper.php'); 

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

// Add a transfer
$addTransfer = $dataService->Add(TransferHelper::getTransferFields($dataService));
echo "Transfer created :::  TxnDate ::: {$addTransfer->TxnDate} \n";

//sparse update transfer
date_default_timezone_set('UTC');
$addTransfer->TxnDate = date('Y-m-d', time()+ 2*(24*60*60));
$addTransfer->sparse = 'true';
$savedTransfer = $dataService->Update($addTransfer);
echo "Transfer sparse updated :::  TxnDate ::: {$savedTransfer->TxnDate} \n";


// update transfer with all fields
$updatedTransfer = TransferHelper::getTransferFields($dataService);
$updatedTransfer->Id = $savedTransfer->Id;
$updatedTransfer->SyncToken = $savedTransfer->SyncToken;
$savedTransfer = $dataService->Update($updatedTransfer);
echo "Transfer updated with all fields :::  TxnDate ::: {$savedTransfer->TxnDate} \n";

?>
