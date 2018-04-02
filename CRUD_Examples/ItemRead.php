<?php
require "../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Item;

// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..v68ufeIpzlQdgLTfqxwnoA.GER9s2adgBDm5qhzVR5uOIjfp7TwW-p-H97J4NVcmI_sqbq63bicdurL-GtoZQ_qRffzOjWYSsSi_erKLqYg_lzs-IFS1jtK2Z_bnO7PnBMoYfDy2Ld1G6gRBGUg40re11VmB4cRtSdotTDUEuXkfF2LYXwrHiUj36-tQ9QypzyJzRmI5anxLfi9NmAqMnbWn9ks-PlMVkaIp1tNkqt_DcQqMMdZH1KL9GLLonXGCh5gI1V8O4Rerhr6NMxftPOGIqzlziU_kOazgIU5NX-eyJsOAh9n7dhkv37TlXYzyF6uXJyZcC9ZIJVEMaiXqUIeedKA8erxo-ypF6XsryAiB3xnZyKxbgtx4DkG8FWcMzFNhWIVcFooF1HCJoVzEwXum9XHgSO-1sHbfHqgG5K9VFbie5UBAHXPNkX2NsycvebDLNqcN6PHCzkK2YFSJ39KYEOlAWE_B_2q__PxE3HG6VrsOi8KTr3hGMuaoyjickr8A6GH6Cq_iRlgOm_aM5eERvusannyC83otvbgrJOp_yjOOxfVr2ZSfftQjUgHSNYpnyebXQRfOcQK6-A5myePlZxQGAS8hLdczzEybEDaj0xRcPEdZ7M_6AlDtl4ubz4u-NGJjQP5R1u7SX7lynXHa8z9HSmLaW56BM1rPEjwFGxW5-TOom_krLmdCJz1sO0lljyzqUQ6c7AjTu4iR_Z5.S_w1ZwLwE8Bo8p5SDyVMvA',
    'refreshTokenKey' => "L011530994357pUIdF4rZSpMC5XCZ2TV4ypu4pOpfen4VRvYzl",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);
//Add a new Invoice

$item = $dataService->FindbyId('item', 24);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$item->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($item, $urlResource);
    echo $xmlBody . "\n";
}
