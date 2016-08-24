<?php
require_once('Telephone.php'); 
require_once('Email.php'); 
require_once('Job.php'); 
require_once('Address.php'); 

class CustomerHelper {
    static function getCustomerFields() {
        $customerObj = new IPPCustomer();
		$customerObj->DisplayName = "DisplayName" . rand();
		$customerObj->Title = "Title" . rand();
		$customerObj->GivenName = "GivenName" . rand();
		$customerObj->MiddleName = "Middle" . rand();
		$customerObj->FamilyName = "Family" . rand();

		$customerObj->Organization = 'false';
		$customerObj->Suffix = "Sr.";
		$customerObj->CompanyName = "CompanyName" . rand();
		$customerObj->Active = 'true';


		$customerObj->PrimaryPhone = Telephone::getPrimaryPhone();
		$customerObj->AlternatePhone = Telephone::getAlternatePhone();
		$customerObj->Mobile = Telephone::getMobilePhone();
		$customerObj->Fax = Telephone::getFax();

		$customerObj->PrimaryEmailAddr = Email::getEmailAddress();

		$customerObj->ContactName = "Contact Name";
		$customerObj->AltContactName = "Alternate Name";
		$customerObj->Notes = "Testing Notes";

		$customerObj->Balance = 0;
		date_default_timezone_set('UTC');
        $customerObj->OpenBalanceDate = date('Y-m-d', time());
		$customerObj->BalanceWithJobs = 5055.5;
		$customerObj->CreditLimit = 200000;
		$customerObj->AcctNum = "Test020102";
		$customerObj->ResaleNum = "40";
		$customerObj->Job = 'false';

		$customerObj->JobInfo = Job::getJobInfo();

		$customerObj->BillAddr = Address::getPhysicalAddress();
		$customerObj->ShipAddr = Address::getPhysicalAddress(); 
        return $customerObj;
    }

    static function createCustomer(DataService $dataService) {
        return $dataService->Add(getCustomerFields());
    }

    static function getCustomer(DataService $dataService) {
        $allCustomers = $dataService->FindAll('Customer', 0, 500);
        if (!$allCustomers || (0==count($allCustomers))) {
        	return createCustomer($dataService);
        } else {
        	return $allCustomers[0];
        }
    }
    
}
?>