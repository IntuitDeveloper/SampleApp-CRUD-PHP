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

$rnd = rand();
$taxRateDetails = new IPPTaxRateDetails();
$taxRateDetails->TaxRateName = "myNewTaxRateName_$rnd";
$taxRateDetails->RateValue = "7";
$taxRateDetails->TaxAgencyId = "1";
$taxRateDetails->TaxApplicableOn = "Sales";

$taxService = new IPPTaxService();
$taxService->TaxCode = 'MyTaxCodeName_' . $rnd;
$taxService->TaxRateDetails = array($taxRateDetails);


$resultingTaxServiceObj = $dataService->Add($taxService);

// Echo some formatted output
echo "Created Item Id={$resultingTaxServiceObj->Id}. Reconstructed response body:\n\n";
$xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingTaxServiceObj, $urlResource);
echo $xmlBody . "\n";
?>

