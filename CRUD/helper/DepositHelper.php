<?php

require_once('AccountHelper.php'); 
require_once('PaymentHelper.php'); 

class DepositHelper {
    static function getDepositFields(DataService $dataService) {
        $deposit = new IPPDeposit();
        date_default_timezone_set('UTC');
        $deposit->TxnDate = date('Y-m-d', time());
        
        $depositAccount = AccountHelper::getAssetAccount($dataService);
        $deposit->DepositToAccountRef = $depositAccount->Id;
        
        $deposit->CashBack = PaymentHelper::getCashBackInfo($dataService);
        
        $deposit->TotalAmt = 6.00;
        
        $line1 = new IPPLine();
        $line1->Amount = 11.00;

        $lineDetailTypeEnum = new IPPLineDetailTypeEnum();
        $line1->DetailType = $lineDetailTypeEnum::IPPLINEDETAILTYPEENUM_DEPOSITLINEDETAIL;
        
        $depositLineDetail = new IPPDepositLineDetail();
        $expenseAccount = AccountHelper::getExpenseBankAccount($dataService);
        $depositLineDetail->AccountRef = $expenseAccount->Id;
        
        $paymentMethod = PaymentHelper::getPaymentMethod($dataService);
        $depositLineDetail->PaymentMethodRef = $paymentMethod->Id;
        
        $line1->DepositLineDetail = $depositLineDetail;
        
        $lTxn = new IPPLinkedTxn();
        $lTxn->TxnId = "55045";
        $lTxn->TxnType = "Payment";
        
        $line1->LinkedTxn = array($lTxn);

        $deposit->Line=array($line1);
        return $deposit;
    }

}
?>