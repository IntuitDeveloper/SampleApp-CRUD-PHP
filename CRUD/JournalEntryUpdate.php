<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/JournalEntryHelper.php'); 

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

// Add a journalEntry
$addJournalEntry = $dataService->Add(JournalEntryHelper::getJournalEntryFields($dataService));
echo "JournalEntry created :::  TxnDate ::: {$addJournalEntry->TxnDate} \n";

//sparse update journalEntry
date_default_timezone_set('UTC');
$addJournalEntry->TxnDate = date('Y-m-d', time() + 2*(24*60*60));
$addJournalEntry->sparse = 'true';
$savedJournalEntry = $dataService->Update($addJournalEntry);
echo "JournalEntry sparse updated :::  TxnDate ::: {$savedJournalEntry->TxnDate} \n";


// update journalEntry with all fields
$updatedJournalEntry = JournalEntryHelper::getJournalEntryFields($dataService);
$updatedJournalEntry->Id = $savedJournalEntry->Id;
$updatedJournalEntry->SyncToken = $savedJournalEntry->SyncToken;
$savedJournalEntry = $dataService->Update($updatedJournalEntry);
echo "JournalEntry updated with all fields :::  TxnDate ::: {$savedJournalEntry->TxnDate} \n";

?>
