<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPTxnTypeEnum
 * @var IPPTxnTypeEnum
 * @xmlDefinition 
				Product: ALL
				Description: Enumeration of transaction types.
			
 */
class IPPTxnTypeEnum
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
				if (property_exists('IPPTxnTypeEnum',$initPropName))
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
		public $value;	const IPPTXNTYPEENUM_APCREDITCARD = "APCreditCard";
	const IPPTXNTYPEENUM_ARREFUNDCREDITCARD = "ARRefundCreditCard";
	const IPPTXNTYPEENUM_BILL = "Bill";
	const IPPTXNTYPEENUM_BILLPAYMENTCHECK = "BillPaymentCheck";
	const IPPTXNTYPEENUM_BUILDASSEMBLY = "BuildAssembly";
	const IPPTXNTYPEENUM_CARRYOVER = "CarryOver";
	const IPPTXNTYPEENUM_CASHPURCHASE = "CashPurchase";
	const IPPTXNTYPEENUM_CHARGE = "Charge";
	const IPPTXNTYPEENUM_CHECK = "Check";
	const IPPTXNTYPEENUM_CREDITMEMO = "CreditMemo";
	const IPPTXNTYPEENUM_DEPOSIT = "Deposit";
	const IPPTXNTYPEENUM_EFPLIABILITYCHECK = "EFPLiabilityCheck";
	const IPPTXNTYPEENUM_EFTBILLPAYMENT = "EFTBillPayment";
	const IPPTXNTYPEENUM_EFTREFUND = "EFTRefund";
	const IPPTXNTYPEENUM_ESTIMATE = "Estimate";
	const IPPTXNTYPEENUM_INVENTORYADJUSTMENT = "InventoryAdjustment";
	const IPPTXNTYPEENUM_INVENTORYTRANSFER = "InventoryTransfer";
	const IPPTXNTYPEENUM_INVOICE = "Invoice";
	const IPPTXNTYPEENUM_ITEMRECEIPT = "ItemReceipt";
	const IPPTXNTYPEENUM_JOURNALENTRY = "JournalEntry";
	const IPPTXNTYPEENUM_LIABILITYADJUSTMENT = "LiabilityAdjustment";
	const IPPTXNTYPEENUM_PAYCHECK = "Paycheck";
	const IPPTXNTYPEENUM_PAYROLLLIABILITYCHECK = "PayrollLiabilityCheck";
	const IPPTXNTYPEENUM_PURCHASEORDER = "PurchaseOrder";
	const IPPTXNTYPEENUM_PRIORPAYMENT = "PriorPayment";
	const IPPTXNTYPEENUM_RECEIVEPAYMENT = "ReceivePayment";
	const IPPTXNTYPEENUM_REFUNDCHECK = "RefundCheck";
	const IPPTXNTYPEENUM_SALESORDER = "SalesOrder";
	const IPPTXNTYPEENUM_SALESRECEIPT = "SalesReceipt";
	const IPPTXNTYPEENUM_SALESTAXPAYMENTCHECK = "SalesTaxPaymentCheck";
	const IPPTXNTYPEENUM_TRANSFER = "Transfer";
	const IPPTXNTYPEENUM_TIMEACTIVITY = "TimeActivity";
	const IPPTXNTYPEENUM_VENDORCREDIT = "VendorCredit";
	const IPPTXNTYPEENUM_YTDADJUSTMENT = "YTDAdjustment";

} // end class IPPTxnTypeEnum
