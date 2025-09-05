<?php
require "../../vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\JournalEntry;
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
$theResourceObj = JournalEntry::create([
    "Line" => [
    [
      "Id" => "0",
      "Description" => "nov portion of rider insurance",
      "Amount" => 100.0,
      "DetailType" => "JournalEntryLineDetail",
      "JournalEntryLineDetail" => [
        "PostingType" => "Debit",
        "AccountRef" => [
            "value" => "39",
            "name" => "Opening Bal Equity"
        ]
     ]
    ],
    [
      "Description" => "nov portion of rider insurance",
      "Amount" => 100.0,
      "DetailType" => "JournalEntryLineDetail",
      "JournalEntryLineDetail" => [
        "PostingType" => "Credit",
          "AccountRef" => [
            "value" => "44",
            "name" => "Notes Payable"
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
