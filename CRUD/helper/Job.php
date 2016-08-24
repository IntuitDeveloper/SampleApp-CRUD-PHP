<?php
class Job {
    static function getJobInfo() {
        $jobInfo = new IPPJobInfo();
		$jobInfo->Description = "In Progress";
		$jobInfo->Status = "InProgress";
		date_default_timezone_set('UTC');
		$jobInfo->StartDate = date('Y-m-d', time() - 2*(24*60*60));
		$jobInfo->EndDate = date('Y-m-d', time() + 5*(24*60*60));
		$jobInfo->ProjectedEndDate = date('Y-m-d', time() + 5*(24*60*60));
        return $jobInfo;
    }
    
}
?>