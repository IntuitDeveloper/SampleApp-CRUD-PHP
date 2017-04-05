<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/VendorCreditHelper.php'); 

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

// Add a vendorCredit
$addVendorCredit = $dataService->Add(VendorCreditHelper::getVendorCreditFields($dataService));
echo "VendorCredit created :::  TxnDate ::: {$addVendorCredit->TxnDate} \n";

//sparse update vendorCredit
date_default_timezone_set('UTC');
$addVendorCredit->TxnDate = date('Y-m-d', time() + 2*(24*60*60));
$addVendorCredit->sparse = 'true';
$savedVendorCredit = $dataService->Update($addVendorCredit);
echo "VendorCredit sparse updated :::  TxnDate ::: {$savedVendorCredit->TxnDate} \n";


// update vendorCredit with all fields
$updatedVendorCredit = VendorCreditHelper::getVendorCreditFields($dataService);
$updatedVendorCredit->Id = $savedVendorCredit->Id;
$updatedVendorCredit->SyncToken = $savedVendorCredit->SyncToken;
$savedVendorCredit = $dataService->Update($updatedVendorCredit);
echo "VendorCredit updated with all fields :::  TxnDate ::: {$savedVendorCredit->TxnDate} \n";

?>
