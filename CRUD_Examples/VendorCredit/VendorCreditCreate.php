<?php
require "../../vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\VendorCredit;
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
$theResourceObj = VendorCredit::create([
      "TxnDate" => "2018-04-01",
      "Line" => [
      [
          "Id" =>"1",
          "Amount" => 90.00,
          "DetailType" => "AccountBasedExpenseLineDetail",
          "AccountBasedExpenseLineDetail" =>
          [
              "CustomerRef" =>
              [
                  "value" =>"1",
                  "name" =>"Amy's Bird Sanctuary"
              ],
              "AccountRef" =>
              [
                  "value" =>"8",
                  "name" => "Bank Charges"
              ],
              "BillableStatus" => "Billable",
              "TaxCodeRef" =>
              [
                  "value" =>"TAX"
              ]
          ]
      ]
      ],
      "VendorRef" =>
      [
          "value" => "56",
          "name" =>"Books by Bessie"
      ],
      "APAccountRef" =>
      [
          "value" =>"33",
          "name" =>"Accounts Payable (A/P)"
      ],
      "TotalAmt" => 90.00
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
