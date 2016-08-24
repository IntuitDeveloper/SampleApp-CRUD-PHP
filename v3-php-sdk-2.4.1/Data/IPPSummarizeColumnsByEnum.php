<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPSummarizeColumnsByEnum
 * @var IPPSummarizeColumnsByEnum
 */
class IPPSummarizeColumnsByEnum
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
				if (property_exists('IPPSummarizeColumnsByEnum',$initPropName))
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
		public $value;	const IPPSUMMARIZECOLUMNSBYENUM_TOTAL = "Total";
	const IPPSUMMARIZECOLUMNSBYENUM_YEAR = "Year";
	const IPPSUMMARIZECOLUMNSBYENUM_QUARTER = "Quarter";
	const IPPSUMMARIZECOLUMNSBYENUM_FISCALYEAR = "FiscalYear";
	const IPPSUMMARIZECOLUMNSBYENUM_FISCALQUARTER = "FiscalQuarter";
	const IPPSUMMARIZECOLUMNSBYENUM_MONTH = "Month";
	const IPPSUMMARIZECOLUMNSBYENUM_WEEK = "Week";
	const IPPSUMMARIZECOLUMNSBYENUM_DAYS = "Days";
	const IPPSUMMARIZECOLUMNSBYENUM_CUSTOMERS = "Customers";
	const IPPSUMMARIZECOLUMNSBYENUM_VENDORS = "Vendors";
	const IPPSUMMARIZECOLUMNSBYENUM_EMPLOYEES = "Employees";
	const IPPSUMMARIZECOLUMNSBYENUM_DEPARTMENTS = "Departments";
	const IPPSUMMARIZECOLUMNSBYENUM_CLASSES = "Classes";
	const IPPSUMMARIZECOLUMNSBYENUM_PRODUCTSANDSERVICES = "ProductsAndServices";

} // end class IPPSummarizeColumnsByEnum
