<?php
require "../../vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\BillPayment;
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
$theResourceObj = BillPayment::create([
  "VendorRef" => [
    "value" => "56",
    "name" => "Bob's Burger Joint"
  ],
  "PayType" => "Check",
  "CheckPayment" => [
    "BankAccountRef" => [
      "value" => "35",
      "name" => "Checking"
    ]
  ],
  "TotalAmt" => 200.00,
  "PrivateNote" => "Acct. 1JK90",
  "Line" => [
    [
      "Amount" => 200.00,
      "LinkedTxn" => [
        [
          "TxnId" => "212",
          "TxnType" => "Bill"
        ]
      ]
    ]
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
