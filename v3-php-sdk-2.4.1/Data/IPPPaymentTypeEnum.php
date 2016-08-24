<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPPaymentTypeEnum
 * @var IPPPaymentTypeEnum
 * @xmlDefinition 
				Product: ALL
				Description: Enumeration of payment types.
			
 */
class IPPPaymentTypeEnum
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
				if (property_exists('IPPPaymentTypeEnum',$initPropName))
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
		public $value;	const IPPPAYMENTTYPEENUM_CASH = "Cash";
	const IPPPAYMENTTYPEENUM_CHECK = "Check";
	const IPPPAYMENTTYPEENUM_CREDITCARD = "CreditCard";
	const IPPPAYMENTTYPEENUM_EXPENSE = "Expense";
	const IPPPAYMENTTYPEENUM_OTHER = "Other";

} // end class IPPPaymentTypeEnum
