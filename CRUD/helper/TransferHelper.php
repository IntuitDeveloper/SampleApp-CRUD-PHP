<?php

require_once('AccountHelper.php'); 

class TransferHelper {
    static function getTransferFields(DataService $dataService) {
        $transfer = new IPPTransfer();
        date_default_timezone_set('UTC');
        $transfer->TxnDate = date('Y-m-d', time());
        
        $depositAccount = AccountHelper::getAssetAccount($dataService);
        $transfer->FromAccountRef = $depositAccount->Id;
        
        $creditAccount = AccountHelper::getCreditCardBankAccount($dataService);
        $transfer->ToAccountRef = $creditAccount->Id;
        
        $transfer->Amount = 100.00;
        $transfer->Domain = "QBO";
        $transfer->PrivateNote = "Transfer amount ";
    
        return $transfer;
    }

}
?>