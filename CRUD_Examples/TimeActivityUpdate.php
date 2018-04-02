<?php
require "../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\TimeActivity;

// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..T4MzZh8rIaphrrSF-uhBwg.ntH2i8eFFDsZXXLOGpA3f9XKnDWsBoK4S0aYNrnykF5HOgH-FbCMMxfgkjC4291nmDC3XCd9v0Ly76Wr0BlASbBwqwYr4CAVvd1IK2NmMDdWMjIMhJUEUOszQPGoDg3K-vfcj8UX8bVZpdOuJH4Gg0XhlvFwuBDd2AGbrEvii_X32oUDfuvsRwcNJxHtuTSSOnlhV81AZhemWRteQWniEiqvorFsPBskmU20fX_lB8cWzj5v9BUhALJKVqTj7d5qjR7mQl9ew3RKZbnP3aMY76vWeV_S6C3IQZ-7SJRuzcOd0tRsIEYrAPDVOf4eori2HVmS0uR3Vu4nQVd1kqzIUsdpIgwax6PyTR8NjV-BhkDvkVpL6OHLa8M5fijRorF7i-JNFkxDMmwNH6s0jJcka67Zl7U6upJzVVjuWXwzx-0OGptP_qhh9lacERSoYea33ptUYFgqK1zyyIS6KYuD1FyTNf29MBmVFfUJNcMZ25F_BU2lnA-AX_FlA0G85z_V1T0iPbuxObrLui9U0lvzrTNw3ttM-Ibj-HvSYvug09qtRzqyQHjXpmO-CNyfzocrLrvx1v3HeRI99jd4I1dGEliomM5v8PV-s5TNxDtcCRltA7VFvSLl_xD6-U5SbBfoAQXgrh4uVjyIGkLQGJ6kGjux7IZC990RK6Hjqxt41BKBvf3_YkMmzKhdxJQx7ccu.pZS_qVZoHrlTC7jVgzhFng',
    'refreshTokenKey' => "L011530994357pUIdF4rZSpMC5XCZ2TV4ypu4pOpfen4VRvYzl",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);

$timeActivity = $dataService->FindbyId('timeactivity', 8);

$theResourceObj = TimeActivity::update($timeActivity, [
     "Description" => "Updated descirption"
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
