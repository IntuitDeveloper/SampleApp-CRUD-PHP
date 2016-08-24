<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/ClassHelper.php'); 

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

// Add a class
$addClass = $dataService->Add(ClassHelper::getClassFields());
echo "Class created :::  name ::: {$addClass->Name} \n";

//sparse update class
$addClass->Name = "New Name " . rand();
$addClass->sparse = 'true';
$savedClass = $dataService->Update($addClass);
echo "Class sparse updated :::  name ::: {$savedClass->Name} \n";


// update class with all fields
$updatedClass = ClassHelper::getClassFields();
$updatedClass->Id = $savedClass->Id;
$updatedClass->SyncToken = $savedClass->SyncToken;
$savedClass = $dataService->Update($updatedClass);
echo "Class updated with all fields :::  name ::: {$savedClass->Name} \n";

?>
