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

// Add a bill
$addBill = $dataService->Add(BillHelper::getBillFields($dataService));
echo "Bill created :::  DueDate ::: {$addBill->DueDate} \n";

//sparse update bill
date_default_timezone_set('UTC');
$addBill->DueDate = date('Y-m-d', time() + 40*(24*60*60));
$addBill->sparse = 'true';
$savedBill = $dataService->Update($addBill);
echo "Bill sparse updated :::  DueDate ::: {$savedBill->DueDate} \n";


// update bill with all fields
$updatedBill = BillHelper::getBillFields($dataService);
$updatedBill->Id = $savedBill->Id;
$updatedBill->SyncToken = $savedBill->SyncToken;
$savedBill = $dataService->Update($updatedBill);
echo "Bill updated with all fields :::  DueDate ::: {$savedBill->DueDate} \n";

?>
