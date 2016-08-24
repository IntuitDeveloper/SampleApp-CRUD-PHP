<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/InvoiceHelper.php'); 

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

// Add a invoice
$addInvoice = $dataService->Add(InvoiceHelper::getInvoiceFields($dataService));
echo "Invoice created :::  DocNumber ::: {$addInvoice->DocNumber} \n";

//sparse update invoice
$addInvoice->DocNumber = rand(0,999);
$addInvoice->sparse = 'true';
$savedInvoice = $dataService->Update($addInvoice);
echo "Invoice sparse updated :::  DocNumber ::: {$savedInvoice->DocNumber} \n";


// update invoice with all fields
$updatedInvoice = InvoiceHelper::getInvoiceFields($dataService);
$updatedInvoice->Id = $savedInvoice->Id;
$updatedInvoice->SyncToken = $savedInvoice->SyncToken;
$savedInvoice = $dataService->Update($updatedInvoice);
echo "Invoice updated with all fields :::  DocNumber ::: {$savedInvoice->DocNumber} \n";

?>
