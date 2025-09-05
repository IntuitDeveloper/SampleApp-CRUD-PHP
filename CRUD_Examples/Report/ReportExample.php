<?php
require "../vendor/autoload.php";

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Purchase;
use QuickBooksOnline\API\Data\IPPPurchase;
use QuickBooksOnline\API\QueryFilter\QueryMessage;
use QuickBooksOnline\API\ReportService\ReportService;
use QuickBooksOnline\API\ReportService\ReportName;


// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "",
    'ClientSecret' => "",
    'accessTokenKey' => '',
    'refreshTokenKey' => "",
    'QBORealmID' => "",
    'baseUrl' => "Development"
));
$serviceContext = $dataService->getServiceContext();
// Prep Data Services
$reportService = new ReportService($serviceContext);
if (!$reportService) {
    exit("Problem while initializing ReportService.\n");
}


$reportService->setStartDate("2015-01-01");
$reportService->setAccountingMethod("Accrual");
$profitAndLossReport = $reportService->executeReport(ReportName::PROFITANDLOSS);

if (!$profitAndLossReport) {
    exit("ProfitAndLossReport Is Null.\n");
} else {
    $reportName = strtolower($profitAndLossReport->Header->ReportName);
    echo("ReportName: " . $reportName . "\n");
    echo("Profit And Loss Report Execution Successful!" . "\n");
}
