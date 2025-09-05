<?php
require "../../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Customer;

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
$theResourceObj = Customer::create([
    "BillAddr" => [
        "Line1" => "123 Main Street",
        "City" => "Mountain View",
        "Country" => "USA",
        "CountrySubDivisionCode" => "CA",
        "PostalCode" => "94042"
    ],
    "Notes" => "Here are other details.",
    "Title" => "Mr",
    "GivenName" => "James",
    "MiddleName" => "B",
    "FamilyName" => "King",
    "Suffix" => "Jr",
    "FullyQualifiedName" => "King Groceries",
    "CompanyName" => "King Groceries",
    "DisplayName" => "King's Groceries Displayname",
    "PrimaryPhone" => [
        "FreeFormNumber" => "(555) 555-5555"
    ],
    "PrimaryEmailAddr" => [
        "Address" => "jdrew@myemail.com"
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
