<?php

require_once('AccountHelper.php'); 
require_once('CustomerHelper.php'); 
require_once('ItemHelper.php'); 

class EstimateHelper {
    static function getEstimateFields(DataService $dataService) {
        $estimate = new IPPEstimate();
		$estimate->DocNumber = rand(0,999);
		
		date_default_timezone_set('UTC');
        $estimate->TxnDate = date('Y-m-d', time());
		$estimate->ExpirationDate = date('Y-m-d', time()+ 15*(24*60*60));
	
		$line1 = new IPPLine();
		$line1->LineNum = "1";
		$line1->Amount = "300.00";

		$lineDetailTypeEnum = new IPPLineDetailTypeEnum();
		$line1->DetailType = $lineDetailTypeEnum::IPPLINEDETAILTYPEENUM_SALESITEMLINEDETAIL;
		
		$salesItemLineDetail = new IPPSalesItemLineDetail();
		$item = ItemHelper::getItem($dataService);
		$salesItemLineDetail->ItemRef = $item->Id;
		
		$taxCodeRef = new IPPReferenceType();
		$taxCodeRef->Value = "NON";
		$salesItemLineDetail->TaxCodeRef = $taxCodeRef;
		$line1->SalesItemLineDetail = $salesItemLineDetail;

		$estimate->Line = array($line1);
		
		$depositAccount = AccountHelper::getCashBankAccount($dataService);
		$estimate->DepositToAccountRef = $depositAccount->Id;

		$customer = CustomerHelper::getCustomer($dataService);
		$estimate->CustomerRef = $customer->Id;

		$estimate->ApplyTaxAfterDiscount = 'false';
		$estimate->TotalAmt = 300.00;
		$estimate->PrivateNote = "Accurate Estimate";

        return $estimate;
    }
    
}
?>