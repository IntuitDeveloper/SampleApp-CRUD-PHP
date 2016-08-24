<?php

require_once('AccountHelper.php'); 

class ItemHelper {
    static function getItemFields(DataService $dataService) {
        $item = new IPPItem();
		
        $item->Name = "Item" . rand();
        $item->Active = 'true';
        $item->Taxable = 'false';
        $item->UnitPrice = 200;

        $itemTypeEnum = new IPPItemTypeEnum();
        $item->Type = $itemTypeEnum::IPPITEMTYPEENUM_SERVICE;

        $incomeAccount = AccountHelper::getIncomeBankAccount($dataService);
        $item->IncomeAccountRef = $incomeAccount->Id;
        
        $item->PurchaseCost = 300;

        $expenseAccount = AccountHelper::getExpenseBankAccount($dataService);
        $item->ExpenseAccountRef = $expenseAccount->Id;

        $item->TrackQtyOnHand = 'false';

        return $item;
    }

    static function createItem(DataService $dataService) {
        return $dataService->Add(getItemFields($dataService));
    }

    static function getItem(DataService $dataService) {
        $allItems = $dataService->FindAll('Item', 0, 500);
        if (!$allItems || (0==count($allItems))) {
            return createItem($dataService);
        } else {
            return $allItems[0];
        }
    }

    
}
?>