<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPLineDetailTypeEnum
 * @var IPPLineDetailTypeEnum
 * @xmlDefinition 
				Product: ALL
				Description: Enumeration line detail types.
			
 */
class IPPLineDetailTypeEnum
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
				if (property_exists('IPPLineDetailTypeEnum',$initPropName))
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
		public $value;	const IPPLINEDETAILTYPEENUM_PAYMENTLINEDETAIL = "PaymentLineDetail";
	const IPPLINEDETAILTYPEENUM_DISCOUNTLINEDETAIL = "DiscountLineDetail";
	const IPPLINEDETAILTYPEENUM_TAXLINEDETAIL = "TaxLineDetail";
	const IPPLINEDETAILTYPEENUM_SALESITEMLINEDETAIL = "SalesItemLineDetail";
	const IPPLINEDETAILTYPEENUM_ITEMBASEDEXPENSELINEDETAIL = "ItemBasedExpenseLineDetail";
	const IPPLINEDETAILTYPEENUM_ACCOUNTBASEDEXPENSELINEDETAIL = "AccountBasedExpenseLineDetail";
	const IPPLINEDETAILTYPEENUM_DEPOSITLINEDETAIL = "DepositLineDetail";
	const IPPLINEDETAILTYPEENUM_PURCHASEORDERITEMLINEDETAIL = "PurchaseOrderItemLineDetail";
	const IPPLINEDETAILTYPEENUM_ITEMRECEIPTLINEDETAIL = "ItemReceiptLineDetail";
	const IPPLINEDETAILTYPEENUM_JOURNALENTRYLINEDETAIL = "JournalEntryLineDetail";
	const IPPLINEDETAILTYPEENUM_GROUPLINEDETAIL = "GroupLineDetail";
	const IPPLINEDETAILTYPEENUM_DESCRIPTIONONLY = "DescriptionOnly";
	const IPPLINEDETAILTYPEENUM_SUBTOTALLINEDETAIL = "SubTotalLineDetail";
	const IPPLINEDETAILTYPEENUM_TDSLINEDETAIL = "TDSLineDetail";

} // end class IPPLineDetailTypeEnum
