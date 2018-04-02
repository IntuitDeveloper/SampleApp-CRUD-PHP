<?php
require "../../vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Account;

// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..37nFpM9YGugRpmZrNQLEYA.3Y6BM-X1k_0EUbBUFAWwXq9y46ZONCZ40sCUHTMmYc93Qf5c2ytcP8Q3ZFrSe9yBK6xGZ4J9VeMyh2QqgWFLrNyz3mqd9fShfgXZRS_kxCMEDZ-m94YS89F8xOP4smIVztlv7bucqj8osDKC52YJC1gi_P7SJoW3uSXOwwhHUARcWnyHsR7Upz4DJ8-yO0n7JWipiHBKdDagMygBIb6GtJ1244jgwE9vND4HiALkCBYrhsh4qWrXyBWKXB_4UWsM-QAIl-YCNszWp6VxFNn4Cyh-kOUNxgHpe9pa5Rt6DbcF6WD_T0MYR8S5srEIs7BisEwY7xstXJbIY_U8qIOZh9LwsQAsaXulJuWl7I4xWQ0yK5H6EEsksa3ZoaS_xeZE1KrHvMbKjHu3diDGAQFgJ9_uRjJWDElh7JT1t56HHCqkpYeNXY6oAXipqTf2Y1DZDlho6lRLBT6ss38XKEJ8aFpI5V3JbyziiVaFbhqPOIi-MD69JK7ItFhsnt2QZkdYZIqBhq1LeeCtmD6lXJSQtyqk3eghBX1uWbeCx4ue4UbyvkhD1QNY4yFqhCIXwPkcCkiDdry8YbchYnmrJ9eh7DU85H5r0YZOewAWYpQ9y_u6QHRdNNr0Otd6mXL7zpDZliQB65czbR479QmYjHqSBmpMwUn3LrvELxrQz2Wyib8fwyA_xQYTJr3w0pUiCtT_.fhIAms_p2AstZBBW6KIkhQ',
    'refreshTokenKey' => "L011530994357pUIdF4rZSpMC5XCZ2TV4ypu4pOpfen4VRvYzl",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);
$account = $dataService->FindbyId('account', 95);
$theResourceObj = Account::update($account , [
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
