<?php
require "../../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;

// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..0iWWydaXU4wJiU399sDtOA.Q-xM33dx6Rsv08hcj-dGTdfDGRItlETQ6udJDny-SteY6d_ROl7KE07pp0EGmyWJGpa8GKlyJKxLJWGt2NqgqUjV3-dPcnUlMRJo-GKAH8HIqqJLyYeOUmswTL2Fzty4ul-DpsPYWdbTQV3tHgw000yQYSPgBnrSCELJPyX3PPgfyGIb1Vh1t9N-qUI6XRP0xpvjKADZfoJQvHgMOpCUYXs1-gYp2N9sfpuiKb68y4g22NOIwCQHvhBZhoMN5dCPFudH8Zf113CqS9fhnk6Wuk7keIyVqZnS3XYam5j_66T7BONEBMN_TU7PYwmofjxLJsTxSyXZPhOXpdoNmlhliujr2YyRUqhicUvjprFNsrBPNWsOc8wrwuPel6Le8wzww5zj3Ws_-oaFOdFj_uKrG0I4YiHyQ6Uyxz7mpzAfn6cohNoQ0enPRL7CecEkYb40353NfRtldgYSsLoZOOmp-px5_8xGD3N6ksD5pI1jadg0tHS4gCsFLwZdp5aCJvy0h9V_uwcexLDGUPYOcwc0UncHgoBpmREeDgMUT2FvcrerWgzZNnd1o4nY1J8-J48dI1V0rT2zGHVD-igQtDCAlZvQD-cGkFnlZ_mvZO0_PYiQ6GoabHVh29xEdd-r8tA-1yF2oWnQSdCqjdslX6xGj6CHHLji2MMusmzdLhTwuEAyGbbZ_OYyBndqTJSW1El1.eA2g5i3puowggTepu_Gkog',
    'refreshTokenKey' => "L011530994357pUIdF4rZSpMC5XCZ2TV4ypu4pOpfen4VRvYzl",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);
//Add a new Invoice

$invoice = $dataService->FindbyId('invoice', 196);
$resultingObj = $dataService->Delete($invoice);
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
