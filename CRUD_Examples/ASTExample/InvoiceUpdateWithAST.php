<?php
require "../../vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "",
    'ClientSecret' => "",
    'accessTokenKey' =>
    '',
    'refreshTokenKey' => "",
    'QBORealmID' => "",
    'baseUrl' => "production"
));
$dataService->setLogLocation("");
$dataService->throwExceptionOnError(true);
//find the invoice we just created
$invoice = $dataService->FindbyId('invoice', 9);

$isASTEnabled = $dataService->getCompanyPreferences()->TaxPrefs->PartnerTaxEnabled;
if(!$isASTEnabled) throw new Exception("AST is not enabled");
//Also, make sure the Sales Deposit is turned on in the settings page, and the AST is enabled.
//we are going to override the tax. Again, the TxnTaxDetail.TxnTaxCodeRef is just a placeholder. It is required. You can use the same value as it is, or some random value, or remove it.
//The only value that matters is the TotalTax here
$theResourceObj = Invoice::update($invoice, [
    "TxnTaxDetail" => [
       //It is the totalTax that matters
       "TotalTax" => 210
   ]
]);
$resultingObj = $dataService->Add($theResourceObj);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
    echo $xmlBody . "\n";
}
