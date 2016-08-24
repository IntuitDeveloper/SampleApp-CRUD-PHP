<?php

class DepartmentHelper {
    static function getDepartmentFields() {
        $department = new IPPDepartment();
		$department->Name = "departmentname_" . rand();
		$department->SubDepartment = 'false';
        return $department;
    }

    static function createDepartment(DataService $dataService) {
        return $dataService->Add(getDepartmentFields());
    }

    static function getDepartment(DataService $dataService) {
        $allDepartments = $dataService->FindAll('Department', 0, 500);
        if (!$allDepartments || (0==count($allDepartments))) {
        	return createDepartment($dataService);
        } else {
        	return $allDepartments[0];
        }
    }
    
}
?>