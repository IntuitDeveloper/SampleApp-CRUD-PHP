<?php

require_once('EmployeeHelper.php'); 

class TimeActivityHelper {
    static function getTimeActivityFields(DataService $dataService) {
        $timeActivity = new IPPTimeActivity();
		$timeActivity->Description = "Time Activity " . rand(0,999);

        $timeActivityTypeEnum = new IPPTimeActivityTypeEnum();
        $timeActivity->NameOf = $timeActivityTypeEnum::IPPTIMEACTIVITYTYPEENUM_EMPLOYEE;
        
        // add Employee Ref     
        $employee = EmployeeHelper::getEmployee($dataService);
        $timeActivity->EmployeeRef = $employee->Id;
     
        date_default_timezone_set('UTC');
        $timeActivity->TxnDate = date('Y-m-d', time());
        $timeActivity->StartTime = date('Y-m-d', time());
        $timeActivity->EndTime = date('Y-m-d', time()+ 2*(24*60*60));
  
        $timeActivity->TimeZone = "UTC";
        $timeActivity->Taxable = 'true';
        $timeActivity->Domain = "QBO";
        return $timeActivity;
    }
    
}
?>