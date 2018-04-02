<?php
require "../../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Customer;

// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..Qr15AgeNJsyIUPdHsqb4CQ.W80WV4CJJCDLj3musjhI0VWO0Yp8K3ONsAfxEKzP3TIjxqDNAeTuwzafabk6p2pbHBLyC7QhStdUfDnGEj1demES4E7cDmfdszE39Ll7WhIFB5VGCIhisKUx1W_v8lwI5_QSWH6iOACYfF5urDfylcr-WLD69PpQtbJNvem1Wj3WlK_Gk3a89sIoBrpLBUVGVoNY4k7MQkWqsohMCk7E4yvQHZtmnaLpvr0tgn5xxWd9N85IR0I_rjuKMCzcDDMRvk4jALQy3ED6BYRMPn-uepCeqPKx9Ucd97quyP05tVu5_7Hd_mRMKFSpQ-PPOpXyuPI7gu-U9WxbKUOZSnNtl9DMexNds6LETyGq2CZoN_X17-it9vVodG-0_lpYIraizHbBzjDo8YuP1nfZ03OWsIlLnOCy112ptg_0C17pL1qNoHEn4a7UcQ5GTsnuJD2LtXF_0TZ-1YjzP5CUHdeNIdD_kjtWR86xy7QF7jnqyPD1UXqOXgiNcgBF9U24cwg2YWS0nDJN6SfB0dbv_PIdxiCGgfoDOTTC5THDR90o1zHxLlUtg1sNJ8aalJnZEQGwY3V0ybQtFvtYnvOKe7iJSin6HE7QV_xaZYCUe23Z-SZgmdSjKEVhGuiwbTbBFw9cF-MvAMr_1g3WSvnyIRa4o7po6CosuJhVI18-OYqUdn8KuzuT20OoYoLNE_LqdkAo.DWCzntijHiYR9r-qrr3wjA',
    'refreshTokenKey' => "L011530994357pUIdF4rZSpMC5XCZ2TV4ypu4pOpfen4VRvYzl",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);
$customer = $dataService->FindbyId('customer', 62);
$theResourceObj = Customer::update($customer  , [
        "Active" => false
]);

$resultingObj = $dataService->Update($theResourceObj);
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
