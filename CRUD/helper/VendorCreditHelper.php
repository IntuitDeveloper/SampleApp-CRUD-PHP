<?php

require_once('VendorHelper.php'); 
require_once('AccountHelper.php'); 

class VendorCreditHelper {
    static function getVendorCreditFields(DataService $dataService) {
        $vendorCredit = new IPPVendorCredit();
		$vendor = VendorHelper::getVendor($dataService);
        $vendorCredit->VendorRef = $vendor->Id;
        
        $account = AccountHelper::getLiabilityBankAccount($dataService);
        $vendorCredit->APAccountRef = $account->Id;

        $line1 = new IPPLine();
        $line1->Amount = 30.00;

        $lineDetailTypeEnum = new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineDetailTypeEnum::IPPLINEDETAILTYPEENUM_ACCOUNTBASEDEXPENSELINEDETAIL;
        $detail = new IPPAccountBasedExpenseLineDetail();
        $expenseAccount = AccountHelper::getExpenseBankAccount($dataService);
        $detail->AccountRef = $expenseAccount->Id;
        $line1->AccountBasedExpenseLineDetail = $detail;
        
        $vendorCredit->Line = array($line1);

        $vendorCredit->Domain = "QBO";      
        $vendorCredit->PrivateNote = "Credit should be specified";
        date_default_timezone_set('UTC');
        $vendorCredit->TxnDate = date('Y-m-d', time());
        $vendorCredit->TotalAmt = 30.00;
        return $vendorCredit;
    }
    
}
?>