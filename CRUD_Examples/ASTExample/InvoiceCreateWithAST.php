<?php
require "../../vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q094uKi203zS1V1ZxH6dyff236cHa2CQhFiXs3JZFjRq1Gmu9f",
    'ClientSecret' => "NacL2Q92jmFEKjycARHEw8qrGGD1fv89OMxbjjbq",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..cKbx7-6jqrrapV7zIZyFTQ.7seYzuxsB74f3fKwl3LRgaHWN9YjYmU7uXnrwrebB5oAtVaDfn1-BLzJ-WNcWyQ-T2y-RAvY7ObfCyehkuejhQSu2Qv9o-7T-A1VlJ1n7Eeez0lzKA3KmHh5BOrkaC9Zr5ttZ2l9Q9esbotExk71ujhCJ8H5roMe5vnPoPsGRm3m5AUqITbNtsJjg1j3zucOOrwAjEvNEAxbKn83uAbQVlmpeXK3-511ezADe2i6xCXSABFCS9w79VgZPpXi_VXjhrubseQ01ognVQaY1PZN0-YvRmEfayXN3PQgHL4cKWQcqvS4mc3qbGTGmvWuaI5Bb8i2pRyN4efURqzDLB0sQCSqlRyGsHJJWVCRMW2qOBggpv83rRBUwOaBdHlVz1HIviz30vuWM711CKirGLi1sPTSTVGIR-2HFuNZcGKB77Wh7ZpUVwP0y61LENgkKhLmvlSSrCQUEiySy3fY2he2esCwuWKi0ViZhaAqLgtb0p8bZThE-jNaZMesY3vfZo0Ko2Xgelce6K7wjLYqB5IxluSOreflDqgLahljRsfmvIlzq8ETkMisLNzaGnWPrHF9iVIN6H7w8hZ26GNt9vmz835XXE5pKb3cv_rqxQH3pzXMdCbnn1_Fn4w_I6euonj-hKvvPTUwSHcp9x7iJpoB0ruj7KGy9TQABSkrYEYrqENDkFcPDYypzHDw8L2oNha6.Ai1vpt8b-fbgZ9f7qDGSCA',
    'refreshTokenKey' => "L011530994357pUIdF4rZSpMC5XCZ2TV4ypu4pOpfen4VRvYzl",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);

$isASTEnabled = $dataService->getCompanyPreferences()->TaxPrefs->PartnerTaxEnabled;
if(!$isASTEnabled) throw new Exception("AST is not enabled");
//Add a new Invoice
//In order for AST to work, the TxnTaxDetail.TxnTaxCodeRef has to be provided. However, the value does not matter once AST is enabled.
$theResourceObj = Invoice::create([
    "Line" => [
    [
      "Description" => "Test AST from API",
      "Amount" => 200.0,
      "DetailType" => "SalesItemLineDetail",
      "SalesItemLineDetail" => [
        "ItemRef" => [
          "value" => "2",
          "name" => "Hours"
        ],
        "UnitPrice" => 200,
        "Qty" => 1,
        "TaxCodeRef" => [
          "value" => "TAX"
        ]
      ]
    ]
    ],
    "TxnTaxDetail" => [
        "TxnTaxCodeRef" => [
            //The value here does not matter. It is a place holder. THe QBO will decide the TaxCode based on the Bill Address and
            //destination address of the Customer.
            "value" => "14"
    ]
    ],
    "CustomerRef"=> [
          "value"=> 1
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
