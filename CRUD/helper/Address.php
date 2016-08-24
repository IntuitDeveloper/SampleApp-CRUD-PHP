<?php
class Address {
    static function getPhysicalAddress() {
        $address = new IPPPhysicalAddress();
		$address->Line1 = "123 Main St";
		$address->City = "Mountain View";
		$address->Country = "United States";
		$address->CountrySubDivisionCode = "CA";
		$address->PostalCode  = "94043";
        return $address;
    }

    static function getWebSiteAddress() {
        $address = new IPPWebSiteAddress();
		$address->URI = "http://abccorp.com";
		$address->Default = 'true';
		$address->Tag  = "Business";
        return $address;
    }
    
}
?>