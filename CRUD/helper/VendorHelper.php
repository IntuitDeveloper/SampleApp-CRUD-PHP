<?php

require_once('Address.php'); 
require_once('Email.php'); 
require_once('Telephone.php'); 
require_once('TermHelper.php'); 

class VendorHelper {
    static function getVendorFields(DataService $dataService) {
        $vendor = new IPPVendor();
		$vendor->DisplayName = "Vendor_" . rand();

        // Optional Fields
        $vendor->CompanyName = "ABC Corp";
        $vendor->Title = rand();
        $vendor->GivenName = rand();
        $vendor->MiddleName = rand();
        $vendor->FamilyName = rand();
        $vendor->Suffix = "Sr.";
        $vendor->PrintOnCheckName = "MS";
            
        $vendor->BillAddr = Address::getPhysicalAddress();
        
        $vendor->TaxIdentifier = "1111111";
        
        $vendor->PrimaryEmailAddr = Email::getEmailAddress();
        
        $vendor->PrimaryPhone = Telephone::getPrimaryPhone();
        $vendor->AlternatePhone = Telephone::getAlternatePhone();
        $vendor->Mobile = Telephone::getMobilePhone();
        $vendor->Fax = Telephone::getFax();
    
        $vendor->WebAddr = Address::getWebSiteAddress();
        
        $vendor->Domain = "QBO";

        $term = TermHelper::getTerm($dataService);
        $vendor->TermRef = $term->Id;
        
        $vendor->AcctNum = "11223344";
        $vendor->Balance = 0;
        
        date_default_timezone_set('UTC');
        $vendor->OpenBalanceDate = date('Y-m-d', time());
        return $vendor;
    }

    static function createVendor(DataService $dataService) {
        return $dataService->Add(getVendorFields($dataService));
    }

    static function getVendor(DataService $dataService) {
        $allVendors = $dataService->FindAll('Vendor', 0, 500);
        if (!$allVendors || (0==count($allVendors))) {
        	return createVendor($dataService);
        } else {
        	return $allVendors[0];
        }
    }
    
}
?>