<?php
class TaxCodeHelper {
    static function getTaxCode(DataService $dataService) {
        $allTaxCodes = $dataService->FindAll('TaxCode', 0, 500);
        return $allTaxCodes[0];
    }
    
}
?>