<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPMonthEnum
 * @var IPPMonthEnum
 * @xmlDefinition Month enumeration
 */
class IPPMonthEnum
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
				if (property_exists('IPPMonthEnum',$initPropName))
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
		public $value;	const IPPMONTHENUM_JANUARY = "January";
	const IPPMONTHENUM_FEBRUARY = "February";
	const IPPMONTHENUM_MARCH = "March";
	const IPPMONTHENUM_APRIL = "April";
	const IPPMONTHENUM_MAY = "May";
	const IPPMONTHENUM_JUNE = "June";
	const IPPMONTHENUM_JULY = "July";
	const IPPMONTHENUM_AUGUST = "August";
	const IPPMONTHENUM_SEPTEMBER = "September";
	const IPPMONTHENUM_OCTOBER = "October";
	const IPPMONTHENUM_NOVEMBER = "November";
	const IPPMONTHENUM_DECEMBER = "December";

} // end class IPPMonthEnum
