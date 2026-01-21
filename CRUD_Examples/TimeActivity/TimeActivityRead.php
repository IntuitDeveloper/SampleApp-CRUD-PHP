<?php
require "../../vendor/autoload.php";
require "../../config.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\TimeActivity;

$dataService = getDataService();

$timeActivity = $dataService->FindbyId('timeactivity', 8);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$timeActivity->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($timeActivity, $urlResource);
    echo $xmlBody . "\n";
}

// Notice we do not use a closing tag for a php-only file. It is poor practice to do so. Find out more here https://stackoverflow.com/questions/4410704/why-would-one-omit-the-close-tag
