<?php

require_once('CustomerHelper.php'); 
require_once('ItemHelper.php'); 


class CreditMemoHelper {
    static function getCreditMemoFields(DataService $dataService) {
        $creditMemo = new IPPCreditMemo();
		
        $customer = CustomerHelper::getCustomer($dataService);
        $creditMemo->CustomerRef = $customer->Id;
        
        $line1 = new IPPLine();
        $line1->sLineNum = 1;
        $line1->Amount = 300.00;

        $lineItemDetailEnum = new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineItemDetailEnum::IPPLINEDETAILTYPEENUM_SALESITEMLINEDETAIL;
        
        $salesItemLineDetail1 = new IPPSalesItemLineDetail();
        $item = ItemHelper::getItem($dataService);
        $salesItemLineDetail1->ItemRef = $item->Id;      
        $line1->SalesItemLineDetail = $salesItemLineDetail1;
        
        $creditMemo->Line=array($line1);
        
        $creditMemo->DocNumber = rand(0,999);
        date_default_timezone_set('UTC');
        $creditMemo->TxnDate = date('Y-m-d', time());
        
        return $creditMemo;
    }

    
}
?>