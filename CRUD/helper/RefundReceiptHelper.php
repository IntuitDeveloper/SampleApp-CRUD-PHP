<?php

require_once('CustomerHelper.php'); 
require_once('ItemHelper.php'); 
require_once('TaxCodeHelper.php'); 
require_once('AccountHelper.php'); 


class RefundReceiptHelper {
    static function getRefundReceiptFields(DataService $dataService) {
        $refundReceipt = new IPPRefundReceipt();
		
        $refundReceipt->DocNumber = rand(0,999);
        date_default_timezone_set('UTC');
        $refundReceipt->TxnDate = date('Y-m-d', time());

        $line1 = new IPPLine();
        $line1->LineNum = 1;
        $line1->Amount = 300.00;

        $lineItemDetailEnum = new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineItemDetailEnum::IPPLINEDETAILTYPEENUM_SALESITEMLINEDETAIL;

        $salesItemLineDetail1 = new IPPSalesItemLineDetail();
        $item = ItemHelper::getItem($dataService);
        $salesItemLineDetail1->ItemRef = $item->Id;

        $taxcode = TaxCodeHelper::getTaxCode($dataService);
        $salesItemLineDetail1->TaxCodeRef = $taxcode->Id;

        $line1->SalesItemLineDetail = $salesItemLineDetail1;

        $line2 = new IPPLine();
        $line2->Amount = 300.00;
        $salesItemLineDetail2 = new IPPSalesItemLineDetail();
        $line2->DetailType = $lineItemDetailEnum::IPPLINEDETAILTYPEENUM_SUBTOTALLINEDETAIL;
        $line2->SubTotalLineDetail = new IPPSubTotalLineDetail();

        $refundReceipt->Line = array($line1, $line2);

        $depositAccount = AccountHelper::getAssetAccount($dataService);
        $refundReceipt->DepositToAccountRef = $depositAccount->Id;

        $customer = CustomerHelper::getCustomer($dataService);
        $refundReceipt->CustomerRef = $customer->Id;

        $refundReceipt->ApplyTaxAfterDiscount = 'false';
        $refundReceipt->TotalAmt = 300.00; 
        
        return $refundReceipt;
    }

    
}
?>