<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPSpecialTaxTypeEnum
 * @var IPPSpecialTaxTypeEnum
 * @xmlDefinition 
				Product: QBO
				Description: Enumeration of SpecialTaxType
			
 */
class IPPSpecialTaxTypeEnum
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
				if (property_exists('IPPSpecialTaxTypeEnum',$initPropName))
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
		public $value;	const IPPSPECIALTAXTYPEENUM_NONE = "NONE";
	const IPPSPECIALTAXTYPEENUM_ZERO_RATE = "ZERO_RATE";
	const IPPSPECIALTAXTYPEENUM_FOREIGN_TAX = "FOREIGN_TAX";
	const IPPSPECIALTAXTYPEENUM_REVERSE_CHARGE = "REVERSE_CHARGE";
	const IPPSPECIALTAXTYPEENUM_ADJUSTMENT_RATE = "ADJUSTMENT_RATE";

} // end class IPPSpecialTaxTypeEnum
