<?php
require "../../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Vendor;

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
$theResourceObj = Vendor::create([
    "BillAddr" => [
        "Line1" => "Dianne's Auto Shop",
        "Line2" => "Dianne Bradley",
        "Line3" => "29834 Mustang Ave.",
        "City" => "Millbrae",
        "Country" => "U.S.A",
        "CountrySubDivisionCode" => "CA",
        "PostalCode" => "94030"
    ],
    "TaxIdentifier" => "99-5688293",
    "AcctNum" => "35372649",
    "Title" => "Ms.",
    "GivenName" => "Dianne",
    "FamilyName" => "Bradley",
    "Suffix" => "Sr.",
    "CompanyName" => "Dianne's Auto Shop",
    "DisplayName" => "Dianne's Auto Shop",
    "PrintOnCheckName" => "Dianne's Auto Shop",
    "PrimaryPhone" => [
        "FreeFormNumber" => "(650) 555-2342"
    ],
    "Mobile" => [
        "FreeFormNumber" => "(650) 555-2000"
    ],
    "PrimaryEmailAddr" => [
        "Address" => "dbradley@myemail.com"
    ],
    "WebAddr" => [
        "URI" => "http://DiannesAutoShop.com"
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
