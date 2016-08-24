<?php

require_once('VendorHelper.php'); 
require_once('AccountHelper.php'); 
require_once('Email.php'); 
require_once('Address.php'); 
require_once('AccountHelper.php'); 
require_once('PaymentHelper.php'); 

class BillHelper {
    static function getBillFields(DataService $dataService) {
        $bill = new IPPBill();
		
        $vendor = VendorHelper::getVendor($dataService);
        $bill->VendorRef = $vendor->Id;

        $liabilityAccount = AccountHelper::getLiabilityBankAccount($dataService);
        $bill->APAccountRef = $liabilityAccount->Id;

        $line1 = new IPPLine();
        $line1->Amount = 30.00;

        $lineDetailType= new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineDetailType::IPPLINEDETAILTYPEENUM_ACCOUNTBASEDEXPENSELINEDETAIL;

        $lineDetail = new IPPAccountBasedExpenseLineDetail();
        $account = AccountHelper::getExpenseBankAccount($dataService);
        $lineDetail->AccountRef = $account->Id;
        $line1->AccountBasedExpenseLineDetail=$lineDetail;

        $bill->Line=array($line1);

        $bill->BillEmail = Email::getEmailAddress();
        $bill->Domain = "QBO";

        $globalTaxEnum= new IPPGlobalTaxCalculationEnum();
        $bill->GlobalTaxCalculation = $globalTaxEnum::IPPGLOBALTAXCALCULATIONENUM_NOTAPPLICABLE;

        $bill->RemitToAddr = Address::getPhysicalAddress();

        $bill->ReplyEmail = Email::getEmailAddress();

        $bill->ShipAddr = Address::getPhysicalAddress();

        $bill->TotalAmt = 30.00;
        date_default_timezone_set('UTC');
        $bill->TxnDate = date('Y-m-d', time());
        $bill->DueDate = date('Y-m-d', time() + 45*(24*60*60));

        return $bill;
    }

    static function createBill(DataService $dataService) {
        return $dataService->Add(getBillFields($dataService));
    }

    static function getBill(DataService $dataService) {
        $allBills = $dataService->FindAll('Bill', 0, 500);
        if (!$allBills || (0==count($allBills))) {
        	return createBill($dataService);
        } else {
        	return $allBills[0];
        }
    }

    static function getBillPaymentFields(DataService $dataService) {
        $billPayment = new IPPBillPayment();
        date_default_timezone_set('UTC');
        $billPayment->TxnDate = date('Y-m-d', time());
        
        $billPayment->PrivateNote = "Check billPayment";

        $vendor = VendorHelper::getVendor($dataService);
        $billPayment->VendorRef = $vendor->Id;
        
        $line1 = new IPPLine();
        $line1->Amount = 30.00;

        $linkedTxn1 = new IPPLinkedTxn();
        $bill = BillHelper::getBill($dataService);
        $linkedTxn1->TxnId = $bill->Id;
        $linkedTxn1->TxnType = "Bill";

        $line1->LinkedTxn=array($linkedTxn1);

        $billPayment->Line=array($line1);

        $billPaymentCheck = new IPPBillPaymentCheck();
        $bankAccount = AccountHelper::getCheckBankAccount($dataService);
        $billPaymentCheck->BankAccountRef = $bankAccount->Id;
        
        $billPaymentCheck->CheckDetail = PaymentHelper::getCheckPayment();       

        $billPaymentCheck->PayeeAddr = Address::getPhysicalAddress();

        $printStatusEnum= new IPPPrintStatusEnum();
        $billPaymentCheck->PrintStatus = $printStatusEnum::IPPPRINTSTATUSENUM_NEEDTOPRINT;
        
        $billPayment->CheckPayment = $billPaymentCheck;

        $billPaymentTypeEnum= new IPPBillPaymentTypeEnum();
        $billPayment->PayType = $billPaymentTypeEnum::IPPBILLPAYMENTTYPEENUM_CHECK;
        $billPayment->TotalAmt = 30;
        return $billPayment;
    }
    
}
?>