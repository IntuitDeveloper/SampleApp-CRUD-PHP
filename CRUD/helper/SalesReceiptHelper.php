<?php

require_once('CustomerHelper.php'); 
require_once('ItemHelper.php'); 
require_once('TaxCodeHelper.php'); 
require_once('AccountHelper.php'); 


class SalesReceiptHelper {
    static function getSalesReceiptFields(DataService $dataService) {
        $salesReceipt = new IPPSalesReceipt();
		
        $salesReceipt->DocNumber = rand(0,999);
        date_default_timezone_set('UTC');
        $salesReceipt->TxnDate = date('Y-m-d', time());

        $line1 = new IPPLine();
        $line1->LineNum = 1;
        $line1->Amount = 40.00;

        $lineItemDetailEnum = new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineItemDetailEnum::IPPLINEDETAILTYPEENUM_SALESITEMLINEDETAIL;

        $salesItemLineDetail1 = new IPPSalesItemLineDetail();
        $item = ItemHelper::getItem($dataService);
        $salesItemLineDetail1->ItemRef = $item->Id;

        $taxcode = TaxCodeHelper::getTaxCode($dataService);
        $salesItemLineDetail1->TaxCodeRef = $taxcode->Id;

        $salesItemLineDetail1->UnitPrice = 40.00;
        $salesItemLineDetail1->Qty = 1;
        $line1->SalesItemLineDetail = $salesItemLineDetail1;

        $line2 = new IPPLine();
        $line2->Amount = 60.00;
        $line2->DetailType = $lineItemDetailEnum::IPPLINEDETAILTYPEENUM_SUBTOTALLINEDETAIL;

        $salesItemLineDetail2 = new IPPSalesItemLineDetail();
        $salesItemLineDetail2->ItemRef = $item->Id;
        $salesItemLineDetail2->TaxCodeRef = $taxcode->Id;
        $salesItemLineDetail2->UnitPrice = 60.00;
        $salesItemLineDetail2->Qty = 1;
        $line2->SalesItemLineDetail = $salesItemLineDetail2;

        $salesReceipt->Line = array($line1, $line2);

        $depositAccount = AccountHelper::getAssetAccount($dataService);
        $salesReceipt->DepositToAccountRef = $depositAccount->Id;

        $customer = CustomerHelper::getCustomer($dataService);
        $salesReceipt->CustomerRef = $customer->Id;

        $salesReceipt->ApplyTaxAfterDiscount = 'false';
        $salesReceipt->TotalAmt = 100.00;
        return $salesReceipt;
    }

    
}
?>