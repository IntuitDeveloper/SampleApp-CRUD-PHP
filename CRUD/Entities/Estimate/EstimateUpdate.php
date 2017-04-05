<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/EstimateHelper.php'); 

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

// Add a estimate
$addEstimate = $dataService->Add(EstimateHelper::getEstimateFields($dataService));
echo "Estimate created :::  name ::: {$addEstimate->DocNumber} \n";

//sparse update estimate
$addEstimate->DocNumber = rand(0,999);
$addEstimate->sparse = 'true';
$savedEstimate = $dataService->Update($addEstimate);
echo "Estimate sparse updated :::  name ::: {$savedEstimate->DocNumber} \n";


// update estimate with all fields
$updatedEstimate = EstimateHelper::getEstimateFields($dataService);
$updatedEstimate->Id = $savedEstimate->Id;
$updatedEstimate->SyncToken = $savedEstimate->SyncToken;
$savedEstimate = $dataService->Update($updatedEstimate);
echo "Estimate updated with all fields :::  name ::: {$savedEstimate->DocNumber} \n";

?>
