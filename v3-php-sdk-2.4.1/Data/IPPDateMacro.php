<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPDateMacro
 * @var IPPDateMacro
 * @xmlDefinition Date macros enumeration
 */
class IPPDateMacro
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
				if (property_exists('IPPDateMacro',$initPropName))
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
		public $value;	const IPPDATEMACRO_ALL = "All";
	const IPPDATEMACRO_TODAY = "Today";
	const IPPDATEMACRO_THIS_WEEK = "This Week";
	const IPPDATEMACRO_THIS_WEEK_TO_DATE = "This Week-to-date";
	const IPPDATEMACRO_THIS_MONTH = "This Month";
	const IPPDATEMACRO_THIS_MONTH_TO_DATE = "This Month-to-date";
	const IPPDATEMACRO_THIS_FISCAL_QUARTER = "This Fiscal Quarter";
	const IPPDATEMACRO_THIS_FISCAL_QUARTER_TO_DATE = "This Fiscal Quarter-to-date";
	const IPPDATEMACRO_THIS_FISCAL_YEAR = "This Fiscal Year";
	const IPPDATEMACRO_THIS_FISCAL_YEAR_TO_DATE = "This Fiscal Year-to-date";
	const IPPDATEMACRO_THIS_CALENDAR_QUARTER = "This Calendar Quarter";
	const IPPDATEMACRO_THIS_CALENDAR_QUARTER_TO_DATE = "This Calendar Quarter-to-date";
	const IPPDATEMACRO_THIS_CALENDAR_YEAR = "This Calendar Year";
	const IPPDATEMACRO_THIS_CALENDAR_YEAR_TO_DATE = "This Calendar Year-to-date";
	const IPPDATEMACRO_YESTERDAY = "Yesterday";
	const IPPDATEMACRO_LAST_WEEK = "Last Week";
	const IPPDATEMACRO_LAST_WEEK_TO_DATE = "Last Week-to-date";
	const IPPDATEMACRO_LAST_MONTH = "Last Month";
	const IPPDATEMACRO_LAST_MONTH_TO_DATE = "Last Month-to-date";
	const IPPDATEMACRO_LAST_FISCAL_QUARTER = "Last Fiscal Quarter";
	const IPPDATEMACRO_LAST_FISCAL_QUARTER_TO_DATE = "Last Fiscal Quarter-to-date";
	const IPPDATEMACRO_LAST_FISCAL_YEAR = "Last Fiscal Year";
	const IPPDATEMACRO_LAST_FISCAL_YEAR_TO_DATE = "Last Fiscal Year-to-date";
	const IPPDATEMACRO_LAST_CALENDAR_QUARTER = "Last Calendar Quarter";
	const IPPDATEMACRO_LAST_CALENDAR_QUARTER_TO_DATE = "Last Calendar Quarter-to-date";
	const IPPDATEMACRO_LAST_CALENDAR_YEAR = "Last Calendar Year";
	const IPPDATEMACRO_LAST_CALENDAR_YEAR_TO_DATE = "Last Calendar Year-to-date";
	const IPPDATEMACRO_NEXT_WEEK = "Next Week";
	const IPPDATEMACRO_NEXT_4_WEEKS = "Next 4 Weeks";
	const IPPDATEMACRO_NEXT_MONTH = "Next Month";
	const IPPDATEMACRO_NEXT_FISCAL_QUARTER = "Next Fiscal Quarter";
	const IPPDATEMACRO_NEXT_FISCAL_YEAR = "Next Fiscal Year";
	const IPPDATEMACRO_NEXT_CALENDAR_QUARTER = "Next Calendar Quarter";
	const IPPDATEMACRO_NEXT_CALENDAR_YEAR = "Next Calendar Year";

} // end class IPPDateMacro
