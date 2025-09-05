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

$invoice = $dataService->FindbyId('invoice', 196);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$invoice->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($invoice, $urlResource);
    echo $xmlBody . "\n";
}
