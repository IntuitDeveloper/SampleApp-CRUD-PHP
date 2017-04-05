<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/PaymentHelper.php'); 

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

// Add a paymentMethod
$addPaymentMethod = $dataService->Add(PaymentHelper::getPaymentMethodFields());
echo "PaymentMethod created :::  name ::: {$addPaymentMethod->Name} \n";

//sparse update paymentMethod
$addPaymentMethod->Name = "New Name " . rand();
$addPaymentMethod->sparse = 'true';
$savedPaymentMethod = $dataService->Update($addPaymentMethod);
echo "PaymentMethod sparse updated :::  name ::: {$savedPaymentMethod->Name} \n";


// update paymentMethod with all fields
$updatedPaymentMethod = PaymentHelper::getPaymentMethodFields();
$updatedPaymentMethod->Id = $savedPaymentMethod->Id;
$updatedPaymentMethod->SyncToken = $savedPaymentMethod->SyncToken;
$savedPaymentMethod = $dataService->Update($updatedPaymentMethod);
echo "PaymentMethod updated with all fields :::  name ::: {$savedPaymentMethod->Name} \n";

?>
