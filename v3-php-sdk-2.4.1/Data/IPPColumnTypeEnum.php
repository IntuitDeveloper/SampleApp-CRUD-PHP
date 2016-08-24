<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPColumnTypeEnum
 * @var IPPColumnTypeEnum
 * @xmlDefinition Specifies the column type definition 
 */
class IPPColumnTypeEnum
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
				if (property_exists('IPPColumnTypeEnum',$initPropName))
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
		public $value;	const IPPCOLUMNTYPEENUM_ACCOUNT = "Account";
	const IPPCOLUMNTYPEENUM_MONEY = "Money";
	const IPPCOLUMNTYPEENUM_RATE = "Rate";
	const IPPCOLUMNTYPEENUM_CUSTOMER = "Customer";
	const IPPCOLUMNTYPEENUM_VENDOR = "Vendor";
	const IPPCOLUMNTYPEENUM_EMPLOYEE = "Employee";
	const IPPCOLUMNTYPEENUM_PRODUCTSANDSERVICE = "ProductsAndService";
	const IPPCOLUMNTYPEENUM_DEPARTMENT = "Department";
	const IPPCOLUMNTYPEENUM_CLASS = "Class";
	const IPPCOLUMNTYPEENUM_STRING = "String";

} // end class IPPColumnTypeEnum
