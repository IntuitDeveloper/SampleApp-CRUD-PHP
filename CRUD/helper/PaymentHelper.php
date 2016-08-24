<?php

require_once('AccountHelper.php'); 
require_once('CustomerHelper.php'); 

class PaymentHelper {
    static function getCheckPaymentFields(DataService $dataService) {
        $payment = new IPPPayment();
		
        date_default_timezone_set('UTC');
        $payment->TxnDate = date('Y-m-d', time());    

        $depositAccount = AccountHelper::getAssetAccount($dataService);
        $payment->DepositToAccountRef = $depositAccount->Id;

        $customer = CustomerHelper::getCustomer($dataService);
        $payment->CustomerRef = $customer->Id;

        $paymentMethod = PaymentHelper::getPaymentMethod($dataService);
        $payment->PaymentMethodRef = $paymentMethod->Id;
        
        $paymentTypeEnum = new IPPPaymentTypeEnum();
        $payment->PaymentType = $paymentTypeEnum::IPPPAYMENTTYPEENUM_CHECK;
        
        $payment->CheckPayment = PaymentHelper::getCheckPayment();
        
        $payment->TotalAmt = 11.00;
        $payment->UnappliedAmt = 11.00;
        return $payment;
    }

    static function getCheckPayment() {
        $checkPayment = new IPPCheckPayment();
        $checkPayment->AcctNum = "AccNum" . rand();
        $checkPayment->BankName = "BankName" . rand();
        $checkPayment->CheckNum = "CheckNum" . rand();
        $checkPayment->NameOnAcct = "Name" . rand();
        $checkPayment->Status = "Status" . rand();
        return $checkPayment;
    }

    static function createPaymentMethod(DataService $dataService) {
        return $dataService->Add(getPaymentMethodFields($dataService));
    }

    static function getPaymentMethod(DataService $dataService) {
        $allPaymentMethods = $dataService->FindAll('PaymentMethod', 0, 500);
        if (!$allPaymentMethods || (0==count($allPaymentMethods))) {
        	return createPaymentMethod($dataService);
        } else {
        	return $allPaymentMethods[0];
        }
    }

    static function getPaymentMethodFields() {
        $paymentMethod = new IPPPaymentMethod();
        $paymentMethod->Name = "PaymentMethod " . rand();      
        $paymentMethod->Type = "CREDIT_CARD";
          
        return $paymentMethod;
    }

    static function getCashBackInfo(DataService $dataService) {
        $cashBackInfo = new IPPCashBackInfo();
        $cashbackAccount = AccountHelper::getCashBankAccount($dataService);
        $cashBackInfo->AccountRef = $cashbackAccount->Id;
        $cashBackInfo->Amount = 5.00;
        $cashBackInfo->Memo = "testLinkedTxn";
        return $cashBackInfo;
    }
    
}
?>