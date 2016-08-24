<?php

class ClassHelper {
    static function getClassFields() {
        $class = new IPPClass();
		$class->Name = "Class_" . rand();
		$class->SubClass = 'false';
        return $class;
    }

    static function createClass(DataService $dataService) {
        return $dataService->Add(getClassFields());
    }

    static function getClass(DataService $dataService) {
        $allClasses = $dataService->FindAll('Class', 0, 500);
        if (!$allClasses || (0==count($allClasses))) {
        	return createClass($dataService);
        } else {
        	return $allClasses[0];
        }
    }
    
}
?>