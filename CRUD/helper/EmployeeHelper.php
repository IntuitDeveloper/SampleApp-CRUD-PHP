<?php

require_once('Telephone.php'); 
require_once('Address.php'); 

class EmployeeHelper {
    static function getEmployeeFields() {
        $employee = new IPPEmployee();
		$employee->GivenName = rand();
		$employee->MiddleName = rand();
		$employee->FamilyName = rand();
		$employee->FullyQualifiedName = rand();
		$employee->CompanyName = rand();
		$employee->DisplayName = rand();
		$employee->PrintOnCheckName = rand();

		// Optional Fields
		$employee->PrimaryPhone = Telephone::getPrimaryPhone();
		$employee->Mobile = Telephone::getMobilePhone();
		
		$employee->PrimaryAddr = Address::getPhysicalAddress();
		
		$employee->SSN = "empSSN_" . rand();

		date_default_timezone_set('UTC');
        $employee->HiredDate = date('Y-m-d', time() - 300*(24*60*60));
        $employee->ReleasedDate = date('Y-m-d', time() + 300*(24*60*60));
        $employee->BirthDate = date('Y-m-d', time() - 6200*(24*60*60));
		
		$employee->Gender = "Male";
		$employee->EmployeeNumber = "emp_no". rand(0,999);
        return $employee;
    }

    static function createEmployee(DataService $dataService) {
        return $dataService->Add(getEmployeeFields());
    }

    static function getEmployee(DataService $dataService) {
        $allEmployees = $dataService->FindAll('Employee', 0, 500);
        if (!$allEmployees || (0==count($allEmployees))) {
        	return createEmployee($dataService);
        } else {
        	return $allEmployees[0];
        }
    }
    
}
?>