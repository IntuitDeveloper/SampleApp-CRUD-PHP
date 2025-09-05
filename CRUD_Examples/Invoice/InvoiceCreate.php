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
//Add a new Invoice
$theResourceObj = Invoice::create([
    "Line" => [
    [
         "Amount" => 100.00,
         "DetailType" => "SalesItemLineDetail",
         "SalesItemLineDetail" => [
           "ItemRef" => [
             "value" => 1,
             "name" => "Services"
           ]
         ]
    ]
    ],
    "CustomerRef"=> [
          "value"=> 1
    ],
    "BillEmail" => [
          "Address" => "Familiystore@intuit.com"
    ],
    "BillEmailCc" => [
          "Address" => "a@intuit.com"
    ],
    "BillEmailBcc" => [
          "Address" => "v@intuit.com"
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
