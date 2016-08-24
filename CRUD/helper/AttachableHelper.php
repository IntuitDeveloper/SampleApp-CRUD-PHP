<?php

require_once('InvoiceHelper.php'); 

class AttachableHelper {
    static function getAttachableFields(DataService $dataService) {
        $attachable = new IPPAttachable();
		$attachable->Lat = "25.293112341223";
		$attachable->Long = "-21.3253249834";
		$attachable->PlaceName = "Fake Place";
		$attachable->Note = "Attachable note " . rand();
		$attachable->Tag = "Attachable tag " . rand();
		
		$attachableCategoryEnum = new IPPAttachableCategoryEnum();
		$attachable->Category = $attachableCategoryEnum::IPPATTACHABLECATEGORYENUM_OTHER;

        return $attachable;

    }

    static function getAttachableFieldsForUpload(DataService $dataService) {
        $attachable = new IPPAttachable();
		$attachable->Lat = "25.293112341223";
		$attachable->Long = "-21.3253249834";
		$attachable->PlaceName = "Fake Place";
		$attachable->Note = "Attachable note " . rand();
		$attachable->Tag = "Attachable tag " . rand();
		
		// create attachRef for invoice
		$invoice = InvoiceHelper::getInvoice($dataService);
		
		$entityRef = new IPPReferenceType(array('value'=>$invoice->Id, 'type'=>'Invoice'));
		$attachableRef = new IPPAttachableRef(array('EntityRef'=>$entityRef));

		$attachable->AttachableRef = $attachableRef;

		$attachableCategoryEnum = new IPPAttachableCategoryEnum();
		$attachable->Category = $attachableCategoryEnum::IPPATTACHABLECATEGORYENUM_OTHER;

		$attachable->FileName = rand().".jpg";
		
        return $attachable;

    }
    
}
?>