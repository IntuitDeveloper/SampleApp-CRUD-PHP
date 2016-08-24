<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPAccountTypeEnum
 * @var IPPAccountTypeEnum
 * @xmlDefinition 
				Product: ALL
				Description: Enumeration of Account sub-types(QBW) and Account types(QBO) used to specifically categorize accounts.  Note: QBO doesn't support the "Non-Posting" Account type.
			
 */
class IPPAccountTypeEnum
	{

		/**                                                                       
		* Initializes this object, optionally with pre-defined property values    
		*                                                                         
		* Initializes this object and it's property members, using the dictionary
		* of key/value pairs passed as an optional argument.                      
		*                                                                         
		* @param dictionary $keyValInitializers key/value pairs to be populated into object's properties 
		* @param boolean $verbose specifies whether object should echo warnings   
		*/                                                                        
		public function __construct($keyValInitializers=array(), $verbose=FALSE)
		{
			foreach($keyValInitializers as $initPropName => $initPropVal)
			{
				if (property_exists('IPPAccountTypeEnum',$initPropName))
				{
					$this->{$initPropName} = $initPropVal;
				}
				else
				{
					if ($verbose)
						echo "Property does not exist ($initPropName) in class (".get_class($this).")";
				}
			}
		}

		/**
		 * @xmlType value
		 * @var string
		 */
		public $value;	const IPPACCOUNTTYPEENUM_BANK = "Bank";
	const IPPACCOUNTTYPEENUM_ACCOUNTS_RECEIVABLE = "Accounts Receivable";
	const IPPACCOUNTTYPEENUM_OTHER_CURRENT_ASSET = "Other Current Asset";
	const IPPACCOUNTTYPEENUM_FIXED_ASSET = "Fixed Asset";
	const IPPACCOUNTTYPEENUM_OTHER_ASSET = "Other Asset";
	const IPPACCOUNTTYPEENUM_ACCOUNTS_PAYABLE = "Accounts Payable";
	const IPPACCOUNTTYPEENUM_CREDIT_CARD = "Credit Card";
	const IPPACCOUNTTYPEENUM_OTHER_CURRENT_LIABILITY = "Other Current Liability";
	const IPPACCOUNTTYPEENUM_LONG_TERM_LIABILITY = "Long Term Liability";
	const IPPACCOUNTTYPEENUM_EQUITY = "Equity";
	const IPPACCOUNTTYPEENUM_INCOME = "Income";
	const IPPACCOUNTTYPEENUM_COST_OF_GOODS_SOLD = "Cost of Goods Sold";
	const IPPACCOUNTTYPEENUM_EXPENSE = "Expense";
	const IPPACCOUNTTYPEENUM_OTHER_INCOME = "Other Income";
	const IPPACCOUNTTYPEENUM_OTHER_EXPENSE = "Other Expense";
	const IPPACCOUNTTYPEENUM_NON_POSTING = "Non-Posting";

} // end class IPPAccountTypeEnum
