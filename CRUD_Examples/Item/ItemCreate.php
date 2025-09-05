<?php
require "../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Item;

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
$theResourceObj = Item::create([
  "Name" => "Inventory Supplier Sample",
  "UnitPrice" => 20,
  "IncomeAccountRef" => [
    "value" => "79",
    "name" => "Sales of Product Income"
  ],
  "ExpenseAccountRef" => [
    "value" => "80",
    "name" => "Cost of Goods Sold"
  ],
  "AssetAccountRef" => [
    "value" => "81",
    "name" => "Inventory Asset"
  ],
  "Type" => "Inventory",
  "TrackQtyOnHand" => true,
  "QtyOnHand" => 10,
  "InvStartDate" => "2015-01-01"
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
