<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/EmployeeHelper.php'); 

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

// Add a employee
$addEmployee = $dataService->Add(EmployeeHelper::getEmployeeFields());
echo "Employee created :::  name ::: {$addEmployee->DisplayName} \n";

//sparse update employee
$addEmployee->DisplayName = "New Name " . rand();
$addEmployee->sparse = 'true';
$savedEmployee = $dataService->Update($addEmployee);
echo "Employee sparse updated :::  name ::: {$savedEmployee->DisplayName} \n";


// update employee with all fields
$updatedEmployee = EmployeeHelper::getEmployeeFields();
$updatedEmployee->Id = $savedEmployee->Id;
$updatedEmployee->SyncToken = $savedEmployee->SyncToken;
$savedEmployee = $dataService->Update($updatedEmployee);
echo "Employee updated with all fields :::  name ::: {$savedEmployee->DisplayName} \n";

?>
