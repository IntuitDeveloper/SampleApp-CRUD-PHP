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
    'baseUrl' => "Development"
));
$dataService->setLogLocation("");
$dataService->throwExceptionOnError(true);

$isASTEnabled = $dataService->getCompanyPreferences()->TaxPrefs->PartnerTaxEnabled;
if(!$isASTEnabled) throw new Exception("AST is not enabled");
//Add a new Invoice
//In order for AST to work, the TxnTaxDetail.TxnTaxCodeRef has to be provided. However, the value does not matter once AST is enabled.
$theResourceObj = Invoice::create([
    "Line" => [
    [
      "Description" => "Test AST from API",
      "Amount" => 200.0,
      "DetailType" => "SalesItemLineDetail",
      "SalesItemLineDetail" => [
        "ItemRef" => [
          "value" => "2",
          "name" => "Hours"
        ],
        "UnitPrice" => 200,
        "Qty" => 1,
        "TaxCodeRef" => [
          "value" => "TAX"
        ]
      ]
    ]
    ],
    "TxnTaxDetail" => [
        "TxnTaxCodeRef" => [
            //The value here does not matter. It is a place holder. THe QBO will decide the TaxCode based on the Bill Address and
            //destination address of the Customer.
            "value" => "14"
    ]
    ],
    "CustomerRef"=> [
          "value"=> 1
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
