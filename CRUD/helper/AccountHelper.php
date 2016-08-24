<?php

class AccountHelper {

    static function getBankAccountFields() {
        $account = new IPPAccount();
		$account->Name = "Ba" . rand();
		$account->SubAccount = 'false';
		$account->Active = 'true';

		$accountClassificationEnum = new IPPAccountClassificationEnum();
		$account->Classification = $accountClassificationEnum::IPPACCOUNTCLASSIFICATIONENUM_ASSET;

		$accountTypeEnum = new IPPAccountTypeEnum();
		$account->AccountType = $accountTypeEnum::IPPACCOUNTTYPEENUM_BANK;

		$account->CurrentBalance = 0;
		$account->CurrentBalanceWithSubAccounts = 0;
		$account->TxnLocationType = "FranceOverseas";
		$account->AcctNum = "B" . rand(0,999);
        return $account;
    }

    static function createBankAccount(DataService $dataService) {
        return $dataService->Add(getBankAccountFields());
    }

    static function getCashBankAccount(DataService $dataService) {
    	$allAccounts = $dataService->FindAll('Account', 0, 500);
		
		$accountTypeEnum = new IPPAccountTypeEnum();
		foreach($allAccounts as $account) {
			if ($account->AccountType == $accountTypeEnum::IPPACCOUNTTYPEENUM_BANK) {
				return $account;
			}
		}
		return createBankAccount($dataService);
	}

    static function getOtherCurrentAssetAccountFields() {
        $account = new IPPAccount();
		$account->Name = "Other CurrentAsset" . rand();
		$account->SubAccount = 'false';
		$account->Active = 'true';

		$accountClassificationEnum = new IPPAccountClassificationEnum();
		$account->Classification = $accountClassificationEnum::IPPACCOUNTCLASSIFICATIONENUM_ASSET;

		$accountTypeEnum = new IPPAccountTypeEnum();
		$account->AccountType = $accountTypeEnum::IPPACCOUNTTYPEENUM_OTHER_CURRENT_ASSET;

		$accountSubTypeEnum = new IPPAccountSubTypeEnum();
		$account->AccountSubType = $accountSubTypeEnum::IPPACCOUNTSUBTYPEENUM_OTHERCURRENTASSETS;

		$account->CurrentBalance = 0;
		$account->CurrentBalanceWithSubAccounts = 0;
        return $account;
    }

    static function createOtherCurrentAssetAccount(DataService $dataService) {
        return $dataService->Add(getOtherCurrentAssetAccountFields());
    }

    static function getAssetAccount(DataService $dataService) {
   		$allAccounts = $dataService->FindAll('Account', 0, 500);
		
		$accountTypeEnum = new IPPAccountTypeEnum();
		foreach($allAccounts as $account) {
			if ($account->AccountType == $accountTypeEnum::IPPACCOUNTTYPEENUM_OTHER_CURRENT_ASSET) {
				return $account;
			}
		}
		return createOtherCurrentAssetAccount($dataService);
	}

    static function getCreditCardBankAccountFields() {
        $account = new IPPAccount();
		$account->Name = "CreditCard" . rand();
		$account->SubAccount = 'false';
		$account->Active = 'true';

		$accountClassificationEnum = new IPPAccountClassificationEnum();
		$account->Classification = $accountClassificationEnum::IPPACCOUNTCLASSIFICATIONENUM_LIABILITY;

		$accountTypeEnum = new IPPAccountTypeEnum();
		$account->AccountType = $accountTypeEnum::IPPACCOUNTTYPEENUM_CREDIT_CARD;

		$accountSubTypeEnum = new IPPAccountSubTypeEnum();
		$account->AccountSubType = $accountSubTypeEnum::IPPACCOUNTSUBTYPEENUM_CREDITCARD;

		$account->CurrentBalance = 0;
		$account->CurrentBalanceWithSubAccounts = 0;
        return $account;
    }

    static function createCreditCardBankAccount(DataService $dataService) {
        return $dataService->Add(getCreditCardBankAccountFields());
    }

    static function getCreditCardBankAccount(DataService $dataService) {
    	$allAccounts = $dataService->FindAll('Account', 0, 500);
		
		$accountTypeEnum = new IPPAccountTypeEnum();
		foreach($allAccounts as $account) {
			if ($account->AccountType == $accountTypeEnum::IPPACCOUNTTYPEENUM_CREDIT_CARD) {
				return $account;
			}
		}
		return createCreditCardBankAccount($dataService);
	}
    
    static function getIncomeBankAccountFields() {
        $account = new IPPAccount();
		$account->Name = "Income" . rand();
		$account->SubAccount = 'false';
		$account->Active = 'true';

		$accountClassificationEnum = new IPPAccountClassificationEnum();
		$account->Classification = $accountClassificationEnum::IPPACCOUNTCLASSIFICATIONENUM_REVENUE;

		$accountTypeEnum = new IPPAccountTypeEnum();
		$account->AccountType = $accountTypeEnum::IPPACCOUNTTYPEENUM_INCOME;

		$accountSubTypeEnum = new IPPAccountSubTypeEnum();
		$account->AccountSubType = $accountSubTypeEnum::IPPACCOUNTSUBTYPEENUM_SERVICEFEEINCOME;

		$account->CurrentBalance = 0;
		$account->CurrentBalanceWithSubAccounts = 0;
        return $account;
    }

    static function createIncomeBankAccount(DataService $dataService) {
        return $dataService->Add(getIncomeBankAccountFields());
    }

    static function getIncomeBankAccount(DataService $dataService) {
    	$allAccounts = $dataService->FindAll('Account', 0, 500);
		
		$accountTypeEnum = new IPPAccountTypeEnum();
		foreach($allAccounts as $account) {
			if ($account->AccountType == $accountTypeEnum::IPPACCOUNTTYPEENUM_INCOME) {
				return $account;
			}
		}
		return createIncomeBankAccount($dataService);
	}

    static function getExpenseBankAccountFields() {
        $account = new IPPAccount();
		$account->Name = "Expense" . rand();
		$account->SubAccount = 'false';
		$account->Active = 'true';

		$accountClassificationEnum = new IPPAccountClassificationEnum();
		$account->Classification = $accountClassificationEnum::IPPACCOUNTCLASSIFICATIONENUM_EXPENSE;

		$accountTypeEnum = new IPPAccountTypeEnum();
		$account->AccountType = $accountTypeEnum::IPPACCOUNTTYPEENUM_EXPENSE;

		$accountSubTypeEnum = new IPPAccountSubTypeEnum();
		$account->AccountSubType = $accountSubTypeEnum::IPPACCOUNTSUBTYPEENUM_ADVERTISINGPROMOTIONAL;

		$account->CurrentBalance = 0;
		$account->CurrentBalanceWithSubAccounts = 0;
        return $account;
    }

    static function createExpenseBankAccount(DataService $dataService) {
        return $dataService->Add(getExpenseBankAccountFields());
    }

    static function getExpenseBankAccount(DataService $dataService) {
    	$allAccounts = $dataService->FindAll('Account', 0, 500);
		
		$accountTypeEnum = new IPPAccountTypeEnum();
		foreach($allAccounts as $account) {
			if ($account->AccountType == $accountTypeEnum::IPPACCOUNTTYPEENUM_EXPENSE) {
				return $account;
			}
		}
		return createExpenseBankAccount($dataService);
	}

    static function getLiabilityBankAccountFields() {
        $account = new IPPAccount();
		$account->Name = "Equity" . rand();
		$account->SubAccount = 'false';
		$account->Active = 'true';

		$accountClassificationEnum = new IPPAccountClassificationEnum();
		$account->Classification = $accountClassificationEnum::IPPACCOUNTCLASSIFICATIONENUM_LIABILITY;

		$accountTypeEnum = new IPPAccountTypeEnum();
		$account->AccountType = $accountTypeEnum::IPPACCOUNTTYPEENUM_ACCOUNTS_PAYABLE;

		$accountSubTypeEnum = new IPPAccountSubTypeEnum();
		$account->AccountSubType = $accountSubTypeEnum::IPPACCOUNTSUBTYPEENUM_ACCOUNTSPAYABLE;

		$account->CurrentBalance = 3000;
		$account->CurrentBalanceWithSubAccounts = 3000;
        return $account;
    }

    static function createLiabilityBankAccount(DataService $dataService) {
        return $dataService->Add(getLiabilityBankAccountFields());
    }

    static function getLiabilityBankAccount(DataService $dataService) {
    	$allAccounts = $dataService->FindAll('Account', 0, 500);
		
		$accountTypeEnum = new IPPAccountTypeEnum();
		foreach($allAccounts as $account) {
			if ($account->AccountType == $accountTypeEnum::IPPACCOUNTTYPEENUM_ACCOUNTS_PAYABLE) {
				return $account;
			}
		}
		return createLiabilityBankAccount($dataService);
	}

	static function getCheckBankAccount(DataService $dataService) {
    	$allAccounts = $dataService->FindAll('Account', 0, 500);
		
		$accountTypeEnum = new IPPAccountTypeEnum();
		foreach($allAccounts as $account) {
			if ($account->AccountType == $accountTypeEnum::IPPACCOUNTTYPEENUM_BANK) {
				return $account;
			}
		}
		return createBankAccount($dataService);
	}
}
?>