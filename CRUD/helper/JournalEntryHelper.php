<?php

require_once('AccountHelper.php'); 
require_once('Address.php'); 
require_once('TaxCodeHelper.php'); 
require_once('ItemHelper.php'); 

class JournalEntryHelper {
    static function getJournalEntryFields(DataService $dataService) {
        $journalEntry = new IPPJournalEntry();
        date_default_timezone_set('UTC');
		$journalEntry->TxnDate = date('Y-m-d', time());

		$line1 = new IPPLine();
		$lineItemDetailEnum = new IPPLineDetailTypeEnum();
		$line1->DetailType = $lineItemDetailEnum::IPPLINEDETAILTYPEENUM_JOURNALENTRYLINEDETAIL;
		$journalEntryLineDetail1 = new IPPJournalEntryLineDetail();

		$postingTypeEnum = new IPPPostingTypeEnum();
		$journalEntryLineDetail1->PostingType = $postingTypeEnum::IPPPOSTINGTYPEENUM_DEBIT;
		$debitAccount = AccountHelper::getCashBankAccount($dataService);
        $journalEntryLineDetail1->AccountRef = $debitAccount->Id;
		
		$line1->JournalEntryLineDetail = $journalEntryLineDetail1;
		$line1->Description = "Description " . rand();
		$line1->Amount = 100.00;
		
		$line2 = new IPPLine();
		$line2->DetailType = $lineItemDetailEnum::IPPLINEDETAILTYPEENUM_JOURNALENTRYLINEDETAIL;
		$journalEntryLineDetail2 = new IPPJournalEntryLineDetail();

		$journalEntryLineDetail2->PostingType = $postingTypeEnum::IPPPOSTINGTYPEENUM_CREDIT;
		$creditAccount = AccountHelper::getCreditCardBankAccount($dataService);
        $journalEntryLineDetail2->AccountRef = $creditAccount->Id;
		
		$line2->JournalEntryLineDetail = $journalEntryLineDetail2;
		$line2->Description = "Description " . rand();
		$line2->Amount = 100.00;		
		
		$journalEntry->Line = array($line1, $line2);
		$journalEntry->PrivateNote = "Journal Entry";
		$journalEntry->Domain = "QBO";
        return $journalEntry;
    }

}
?>