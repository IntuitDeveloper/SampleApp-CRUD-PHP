<?php

require_once('VendorHelper.php'); 
require_once('AccountHelper.php');
require_once('Email.php');
require_once('Address.php');

class PurchaseHelper {

    static function getPurchaseFields(DataService $dataService) {
        $purchase = new IPPPurchase();
        
        $line1 = new IPPLine();
        $line1->Amount = 11.00;
        $lineDetailTypeEnum = new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineDetailTypeEnum::IPPLINEDETAILTYPEENUM_ACCOUNTBASEDEXPENSELINEDETAIL;
        
        $accountBasedExpenseLineDetail1 = new IPPAccountBasedExpenseLineDetail();
        $expenseAccount1 = AccountHelper::getExpenseBankAccount($dataService);
        $accountBasedExpenseLineDetail1->AccountRef = $expenseAccount1->Id;
        $taxCodeRef = new IPPReferenceType();
        $taxCodeRef->Value = "NON";
        $accountBasedExpenseLineDetail1->TaxCodeRef = $taxCodeRef;
        $billableStatusEnum = new IPPBillableStatusEnum();
        $accountBasedExpenseLineDetail1->BillableStatus = $billableStatusEnum::IPPBILLABLESTATUSENUM_NOTBILLABLE;

        $line1->AccountBasedExpenseLineDetail = $accountBasedExpenseLineDetail1;

        $line2 = new IPPLine();
        $line2->Amount = 22.00;
        $line2->DetailType = $lineDetailTypeEnum::IPPLINEDETAILTYPEENUM_ACCOUNTBASEDEXPENSELINEDETAIL;
        $accountBasedExpenseLineDetail2 = new IPPAccountBasedExpenseLineDetail();
        $expenseAccount2 = AccountHelper::getExpenseBankAccount($dataService);
        $accountBasedExpenseLineDetail2->AccountRef = $expenseAccount2->Id;
        $accountBasedExpenseLineDetail2->BillableStatus = $billableStatusEnum::IPPBILLABLESTATUSENUM_NOTBILLABLE;

        $line2->AccountBasedExpenseLineDetail = $accountBasedExpenseLineDetail2;
        
        $purchase->Line = array($line1, $line2);

        $account = AccountHelper::getCashBankAccount($dataService);
        $purchase->AccountRef = $account->Id;

        $vendor = VendorHelper::getVendor($dataService);
        $purchase->EntityRef = $vendor->Id;
        
        $paymentTypeEnum = new IPPPaymentTypeEnum();
        $purchase->PaymentType = $paymentTypeEnum::IPPPAYMENTTYPEENUM_CASH;
        $purchase->TotalAmt = 33.00;
        $globalTaxEnum= new IPPGlobalTaxCalculationEnum();
        $purchase->GlobalTaxCalculation = $globalTaxEnum::IPPGLOBALTAXCALCULATIONENUM_TAXEXCLUDED;
        
        $purchase->Memo = "Test Memo " . rand();

        $printStatusEnum = new IPPPrintStatusEnum();
        $purchase->PrintStatus = $printStatusEnum::IPPPRINTSTATUSENUM_NOTSET;
        $purchase->Domain = "QBO";
        $purchase->DocNumber = rand(0,999);

        date_default_timezone_set('UTC');
        $purchase->TxnDate = date('Y-m-d', time());
        
        return $purchase;
    }

    static function getPurchaseOrderFields(DataService $dataService) {
        $purchaseOrder = new IPPPurchaseOrder();
		
        $vendor = VendorHelper::getVendor($dataService);
        $purchaseOrder->VendorRef = $vendor->Id;

        $account = AccountHelper::getLiabilityBankAccount($dataService);
        $purchaseOrder->APAccountRef = $account->Id;
        
        $purchaseOrder->Memo = "For Internal usage";
        
        $line1 = new IPPLine();
        $line1->Amount = 3.00;

        $lineDetailTypeEnum = new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineDetailTypeEnum::IPPLINEDETAILTYPEENUM_ACCOUNTBASEDEXPENSELINEDETAIL;
        
        $detail = new IPPAccountBasedExpenseLineDetail();
        $account1 = AccountHelper::getExpenseBankAccount($dataService);
        $detail->AccountRef = $account1->Id;
        $line1->AccountBasedExpenseLineDetail = $detail;

        $purchaseOrder->Line = array($line1);

        $purchaseOrder->POEmail = Email::getEmailAddress();
        
        $purchaseOrder->Domain = "QBO";
        
        $globalTaxEnum= new IPPGlobalTaxCalculationEnum();
        $purchaseOrder->GlobalTaxCalculation = $globalTaxEnum::IPPGLOBALTAXCALCULATIONENUM_NOTAPPLICABLE;

        $purchaseOrder->ReplyEmail = Email::getEmailAddress();

        $purchaseOrder->ShipAddr = Address::getPhysicalAddress();

        $purchaseOrder->TotalAmt = 3.00;

        date_default_timezone_set('UTC');
        $purchaseOrder->TxnDate = date('Y-m-d', time());
        
        return $purchaseOrder;
    }
    
}
?>