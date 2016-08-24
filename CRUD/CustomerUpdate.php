<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/CustomerHelper.php'); 

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

// Add a customer
$addCustomer = $dataService->Add(CustomerHelper::getCustomerFields());
echo "Customer created :::  name ::: {$addCustomer->DisplayName} \n";

//sparse update customer
$addCustomer->DisplayName = "New Name " . rand();
$addCustomer->sparse = 'true';
$savedCustomer = $dataService->Update($addCustomer);
echo "Customer sparse updated :::  name ::: {$savedCustomer->DisplayName} \n";


// update customer with all fields
$updatedCustomer = CustomerHelper::getCustomerFields();
$updatedCustomer->Id = $savedCustomer->Id;
$updatedCustomer->SyncToken = $savedCustomer->SyncToken;
$savedCustomer = $dataService->Update($updatedCustomer);
echo "Customer updated with all fields :::  name ::: {$savedCustomer->DisplayName} \n";

?>
