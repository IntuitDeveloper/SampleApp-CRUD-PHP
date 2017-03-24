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

// Add a payment
$addPayment = $dataService->Add(PaymentHelper::getCheckPaymentFields($dataService));
echo "Payment created :::  TxnDate ::: {$addPayment->TxnDate} \n";

//sparse update payment
date_default_timezone_set('UTC');
$addPayment->TxnDate = date('Y-m-d', time() + 2*(24*60*60));
$addPayment->sparse = 'true';
$savedPayment = $dataService->Update($addPayment);
echo "Payment sparse updated :::  TxnDate ::: {$savedPayment->TxnDate} \n";


// update payment with all fields
$updatedPayment = PaymentHelper::getCheckPaymentFields($dataService);
$updatedPayment->Id = $savedPayment->Id;
$updatedPayment->SyncToken = $savedPayment->SyncToken;
$savedPayment = $dataService->Update($updatedPayment);
echo "Payment updated with all fields :::  TxnDate ::: {$savedPayment->TxnDate} \n";

?>
