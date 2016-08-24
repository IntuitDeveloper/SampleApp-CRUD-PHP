<?php

class TermHelper {
    static function getTermFields() {
        $term = new IPPTerm();
		$term->Name = "Term_" . rand();
		$term->Active = 'true';
		$term->Type = "STANDARD";
		$term->DiscountPercent = 50.00;
		$term->DueDays = 50;
        return $term;
    }

    static function createTerm(DataService $dataService) {
        return $dataService->Add(getTermFields());
    }

    static function getTerm(DataService $dataService) {
        $allTerms = $dataService->FindAll('Term', 0, 500);
        if (!$allTerms || (0==count($allTerms))) {
        	return createTerm($dataService);
        } else {
        	return $allTerms[0];
        }
    }
    
}
?>