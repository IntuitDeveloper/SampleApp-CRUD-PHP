<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/TimeActivityHelper.php'); 

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

// Add a timeActivity
$addTimeActivity = $dataService->Add(TimeActivityHelper::getTimeActivityFields($dataService));
echo "TimeActivity created :::  TxnDate ::: {$addTimeActivity->TxnDate} \n";

//sparse update timeActivity
date_default_timezone_set('UTC');
$addTimeActivity->TxnDate = date('Y-m-d', time() + 2*(24*60*60));
$addTimeActivity->sparse = 'true';
$savedTimeActivity = $dataService->Update($addTimeActivity);
echo "TimeActivity sparse updated :::  TxnDate ::: {$savedTimeActivity->TxnDate} \n";


// update timeActivity with all fields
$updatedTimeActivity = TimeActivityHelper::getTimeActivityFields($dataService);
$updatedTimeActivity->Id = $savedTimeActivity->Id;
$updatedTimeActivity->SyncToken = $savedTimeActivity->SyncToken;
$savedTimeActivity = $dataService->Update($updatedTimeActivity);
echo "TimeActivity updated with all fields :::  TxnDate ::: {$savedTimeActivity->TxnDate} \n";

?>
