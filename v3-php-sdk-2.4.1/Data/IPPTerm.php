<?php
require_once('IPPIntuitEntity.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTerm
 * @var IPPTerm
 * @xmlDefinition 
				Product: ALL
				Description: The Term entity represents the terms under which a sale is made, typically expressed in the form of days due after the goods are received.  Optionally, a discount of the total amount may be applied if payment is made within a stipulated time.  For example, net 30 indicates that payment is due within 30 days.  A term of 2%/15 net 60 indicates that payment is due within 60 days,  with a discount of 2%  if payment is made within 15 days.   Term also supports: an absolute due date, a number of days from a start date, a percent discount, or an absolute discount. 
		
 */
class IPPTerm
	extends IPPIntuitEntity	{

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
				if (property_exists('IPPTerm',$initPropName))
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
	 * @Definition 
								Product: QBW
								Description: User recognizable name for the term, for example, "Net 30".[br /]Max. length: 31 characters.
								Product: QBO
								Description: User recognizable name for the term, for example, "Net 30".[br /]Max. length: 15 characters.
								Required: QBO
								Filterable: QBO
								Sortable: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
								Product: QBW
								Description: If true, this entity is currently enabled for use by QuickBooks. The default value is true.
								Filterable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Active
	 * @var boolean
	 */
	public $Active;
	/**
	 * @Definition 
								Product: ALL
								Description: Type of the Sales Term. Valid values: Standard or DateDriven, as defined by SalesTermTypeEnum. [br /]Required for the Create operation.
								Required: ALL
								InputType: ALL: ReadOnly
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Type
	 * @var string
	 */
	public $Type;
	/**
	 * @Definition 
								Product: QBW
								Description: Discount percentage available against an amount if paid within the discount window specified for the term. This must be a number between 0 and 100.
								Product: QBO
								Description: Discount percentage available against an amount if paid within the discount window specified for the term. This value is used only when DueDays is specified.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountPercent
	 * @var float
	 */
	public $DiscountPercent;
	/**
	 * @Definition 
										Product: QBW
										Description: Number of days from delivery of goods or services until the payment is due.
										Product: QBO
										Description: Number of days from delivery of goods or services until the payment is due. If DueDays is specified, only DiscountDays and DiscountPercent can be additionally specified.
										Required: QBO
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DueDays
	 * @var integer
	 */
	public $DueDays;
	/**
	 * @Definition 
										Product: QBW
										Description: Discount applies if paid within this number of days.
										Product: QBO
										Description: Number of days for which the discount is applicable, if the payment is made within these days. This value is used only when DueDays is specified.
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountDays
	 * @var integer
	 */
	public $DiscountDays;
	/**
	 * @Definition 
										Product: QBW
										Description: Payment must be received by this day of the month.[br /]Required for the Create request.
										Product: QBO
										Description: Payment must be received by this day of the month. This value is used only when DueDays is not specified.[br /]Required for the Create request.
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DayOfMonthDue
	 * @var integer
	 */
	public $DayOfMonthDue;
	/**
	 * @Definition 
										Product: QBW
										Description: Payment due next month if issued that many days before the DayOfMonthDue.
										Product: QBO
										Description: Payment due next month if issued that many days before the DayOfMonthDue. This value is used only when DueDays is not specified.
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DueNextMonthDays
	 * @var integer
	 */
	public $DueNextMonthDays;
	/**
	 * @Definition 
										Product: QBW
										Description: Discount applies if paid before this day of month.
										Product: QBO
										Description: Discount applies if paid before this day of month. This value is used only when DueDays is not specified.
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountDayOfMonth
	 * @var integer
	 */
	public $DiscountDayOfMonth;
	/**
	 * @Definition 
								Product: ALL
								Description:- Internal use only: extension place holder for SalesTermEx
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesTermEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $SalesTermEx;


} // end class IPPTerm
