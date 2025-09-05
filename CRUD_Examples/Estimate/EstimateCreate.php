<?php
require "../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Estimate;

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
//Add a new Vendor
$theResourceObj = Estimate::create([
  "Line" => [
     [
       "Description" => "Pest Control Services",
       "Amount" => 35.0,
       "DetailType" => "SalesItemLineDetail",
       "SalesItemLineDetail" => [
         "ItemRef" => [
           "value" => "10",
           "name" => "Pest Control"
         ],
         "UnitPrice" => 35,
         "Qty" => 1,
         "TaxCodeRef" => [
           "value" => "NON"
         ]
       ]
     ],
     [
       "Amount" => 35.0,
       "DetailType" => "SubTotalLineDetail",
       "SubTotalLineDetail" => []
     ],
     [
       "Amount" => 3.5,
       "DetailType" => "DiscountLineDetail",
       "DiscountLineDetail" => [
         "PercentBased" => true,
         "DiscountPercent" => 10,
         "DiscountAccountRef" => [
           "value" => "86",
           "name" => "Discounts given"
         ]
       ]
     ]
   ],
   "TxnTaxDetail" => [
     "TotalTax" => 0
   ],
   "CustomerRef" => [
     "value" => "3",
     "name"=> "Cool Cars"
   ],
   "CustomerMemo" => [
     "value" => "Thank you for your business and have a great day!"
   ],
   "BillAddr" => [
     "Id" => "4",
     "Line1" => "65 Ocean Dr.",
     "City" => "Half Moon Bay",
     "CountrySubDivisionCode" => "CA",
     "PostalCode" => "94213"
   ],
   "ShipAddr" => [
     "Id" => "4",
     "Line1" => "65 Ocean Dr.",
     "City" => "Half Moon Bay",
     "CountrySubDivisionCode" => "CA",
     "PostalCode" => "94213"
   ],
   "TotalAmt" => 31.5,
   "ApplyTaxAfterDiscount" => false,
   "PrintStatus" => "NeedToPrint",
   "EmailStatus" => "NotSet",
   "BillEmail" => [
     "Address" => "Cool_Cars@intuit.com"
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
