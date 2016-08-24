<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

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

// Iterate through all RefundReceipts, even if it takes multiple pages
$i = 0;
while (1) {
	$allRefundReceipts = $dataService->FindAll('RefundReceipt', $i, 500);
	if (!$allRefundReceipts || (0==count($allRefundReceipts)))
		break;
	
	foreach($allRefundReceipts as $oneRefundReceipt)
	{
		echo "RefundReceipt Id: {$oneRefundReceipt->Id}\n";
		echo "RefundReceipt Amount: {$oneRefundReceipt->TotalAmt}\n";
		echo "\n";
	}
}

?>
