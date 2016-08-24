<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPAccountSubTypeEnum
 * @var IPPAccountSubTypeEnum
 * @xmlDefinition 
						Product: QBO
						Description: Use Vehicles to track the value of vehicles your business owns and uses for business. This includes off-road vehicles, air planes, helicopters, and boats. If you use a vehicle for both business and personal use, consult your accountant or the IRS to see how you should track its value.
 */
class IPPAccountSubTypeEnum
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
				if (property_exists('IPPAccountSubTypeEnum',$initPropName))
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
		public $value;	const IPPACCOUNTSUBTYPEENUM_ACCOUNTSPAYABLE = "AccountsPayable";
	const IPPACCOUNTSUBTYPEENUM_ACCOUNTSRECEIVABLE = "AccountsReceivable";
	const IPPACCOUNTSUBTYPEENUM_ACCUMULATEDADJUSTMENT = "AccumulatedAdjustment";
	const IPPACCOUNTSUBTYPEENUM_ACCUMULATEDAMORTIZATION = "AccumulatedAmortization";
	const IPPACCOUNTSUBTYPEENUM_ACCUMULATEDAMORTIZATIONOFOTHERASSETS = "AccumulatedAmortizationOfOtherAssets";
	const IPPACCOUNTSUBTYPEENUM_ACCUMULATEDDEPLETION = "AccumulatedDepletion";
	const IPPACCOUNTSUBTYPEENUM_ACCUMULATEDDEPRECIATION = "AccumulatedDepreciation";
	const IPPACCOUNTSUBTYPEENUM_ADVERTISINGPROMOTIONAL = "AdvertisingPromotional";
	const IPPACCOUNTSUBTYPEENUM_ALLOWANCEFORBADDEBTS = "AllowanceForBadDebts";
	const IPPACCOUNTSUBTYPEENUM_AMORTIZATION = "Amortization";
	const IPPACCOUNTSUBTYPEENUM_AUTO = "Auto";
	const IPPACCOUNTSUBTYPEENUM_BADDEBTS = "BadDebts";
	const IPPACCOUNTSUBTYPEENUM_BANKCHARGES = "BankCharges";
	const IPPACCOUNTSUBTYPEENUM_BUILDINGS = "Buildings";
	const IPPACCOUNTSUBTYPEENUM_CASHONHAND = "CashOnHand";
	const IPPACCOUNTSUBTYPEENUM_CHARITABLECONTRIBUTIONS = "CharitableContributions";
	const IPPACCOUNTSUBTYPEENUM_CHECKING = "Checking";
	const IPPACCOUNTSUBTYPEENUM_COMMONSTOCK = "CommonStock";
	const IPPACCOUNTSUBTYPEENUM_COSTOFLABOR = "CostOfLabor";
	const IPPACCOUNTSUBTYPEENUM_COSTOFLABORCOS = "CostOfLaborCos";
	const IPPACCOUNTSUBTYPEENUM_CREDITCARD = "CreditCard";
	const IPPACCOUNTSUBTYPEENUM_DEPLETABLEASSETS = "DepletableAssets";
	const IPPACCOUNTSUBTYPEENUM_DEPRECIATION = "Depreciation";
	const IPPACCOUNTSUBTYPEENUM_DEVELOPMENTCOSTS = "DevelopmentCosts";
	const IPPACCOUNTSUBTYPEENUM_DIRECTDEPOSITPAYABLE = "DirectDepositPayable";
	const IPPACCOUNTSUBTYPEENUM_DISCOUNTSREFUNDSGIVEN = "DiscountsRefundsGiven";
	const IPPACCOUNTSUBTYPEENUM_DIVIDENDINCOME = "DividendIncome";
	const IPPACCOUNTSUBTYPEENUM_DUESSUBSCRIPTIONS = "DuesSubscriptions";
	const IPPACCOUNTSUBTYPEENUM_EMPLOYEECASHADVANCES = "EmployeeCashAdvances";
	const IPPACCOUNTSUBTYPEENUM_ENTERTAINMENT = "Entertainment";
	const IPPACCOUNTSUBTYPEENUM_ENTERTAINMENTMEALS = "EntertainmentMeals";
	const IPPACCOUNTSUBTYPEENUM_EQUIPMENTRENTAL = "EquipmentRental";
	const IPPACCOUNTSUBTYPEENUM_EQUIPMENTRENTALCOS = "EquipmentRentalCos";
	const IPPACCOUNTSUBTYPEENUM_EXCHANGEGAINORLOSS = "ExchangeGainOrLoss";
	const IPPACCOUNTSUBTYPEENUM_FEDERALINCOMETAXPAYABLE = "FederalIncomeTaxPayable";
	const IPPACCOUNTSUBTYPEENUM_FURNITUREANDFIXTURES = "FurnitureAndFixtures";
	const IPPACCOUNTSUBTYPEENUM_GLOBALTAXEXPENSE = "GlobalTaxExpense";
	const IPPACCOUNTSUBTYPEENUM_GLOBALTAXPAYABLE = "GlobalTaxPayable";
	const IPPACCOUNTSUBTYPEENUM_GLOBALTAXSUSPENSE = "GlobalTaxSuspense";
	const IPPACCOUNTSUBTYPEENUM_GOODWILL = "Goodwill";
	const IPPACCOUNTSUBTYPEENUM_INSURANCE = "Insurance";
	const IPPACCOUNTSUBTYPEENUM_INSURANCEPAYABLE = "InsurancePayable";
	const IPPACCOUNTSUBTYPEENUM_INTANGIBLEASSETS = "IntangibleAssets";
	const IPPACCOUNTSUBTYPEENUM_INTERESTEARNED = "InterestEarned";
	const IPPACCOUNTSUBTYPEENUM_INTERESTPAID = "InterestPaid";
	const IPPACCOUNTSUBTYPEENUM_INVENTORY = "Inventory";
	const IPPACCOUNTSUBTYPEENUM_INVESTMENT_MORTGAGEREALESTATELOANS = "Investment_MortgageRealEstateLoans";
	const IPPACCOUNTSUBTYPEENUM_INVESTMENT_OTHER = "Investment_Other";
	const IPPACCOUNTSUBTYPEENUM_INVESTMENT_TAXEXEMPTSECURITIES = "Investment_TaxExemptSecurities";
	const IPPACCOUNTSUBTYPEENUM_INVESTMENT_USGOVERNMENTOBLIGATIONS = "Investment_USGovernmentObligations";
	const IPPACCOUNTSUBTYPEENUM_LAND = "Land";
	const IPPACCOUNTSUBTYPEENUM_LEASEBUYOUT = "LeaseBuyout";
	const IPPACCOUNTSUBTYPEENUM_LEASEHOLDIMPROVEMENTS = "LeaseholdImprovements";
	const IPPACCOUNTSUBTYPEENUM_LEGALPROFESSIONALFEES = "LegalProfessionalFees";
	const IPPACCOUNTSUBTYPEENUM_LICENSES = "Licenses";
	const IPPACCOUNTSUBTYPEENUM_LINEOFCREDIT = "LineOfCredit";
	const IPPACCOUNTSUBTYPEENUM_LOANPAYABLE = "LoanPayable";
	const IPPACCOUNTSUBTYPEENUM_LOANSTOOFFICERS = "LoansToOfficers";
	const IPPACCOUNTSUBTYPEENUM_LOANSTOOTHERS = "LoansToOthers";
	const IPPACCOUNTSUBTYPEENUM_LOANSTOSTOCKHOLDERS = "LoansToStockholders";
	const IPPACCOUNTSUBTYPEENUM_MACHINERYANDEQUIPMENT = "MachineryAndEquipment";
	const IPPACCOUNTSUBTYPEENUM_MONEYMARKET = "MoneyMarket";
	const IPPACCOUNTSUBTYPEENUM_NONPROFITINCOME = "NonProfitIncome";
	const IPPACCOUNTSUBTYPEENUM_NOTESPAYABLE = "NotesPayable";
	const IPPACCOUNTSUBTYPEENUM_OFFICEGENERALADMINISTRATIVEEXPENSES = "OfficeGeneralAdministrativeExpenses";
	const IPPACCOUNTSUBTYPEENUM_OPENINGBALANCEEQUITY = "OpeningBalanceEquity";
	const IPPACCOUNTSUBTYPEENUM_ORGANIZATIONALCOSTS = "OrganizationalCosts";
	const IPPACCOUNTSUBTYPEENUM_OTHERCOSTSOFSERVICECOS = "OtherCostsOfServiceCos";
	const IPPACCOUNTSUBTYPEENUM_OTHERCURRENTASSETS = "OtherCurrentAssets";
	const IPPACCOUNTSUBTYPEENUM_OTHERCURRENTLIABILITIES = "OtherCurrentLiabilities";
	const IPPACCOUNTSUBTYPEENUM_OTHERFIXEDASSETS = "OtherFixedAssets";
	const IPPACCOUNTSUBTYPEENUM_OTHERINVESTMENTINCOME = "OtherInvestmentIncome";
	const IPPACCOUNTSUBTYPEENUM_OTHERLONGTERMASSETS = "OtherLongTermAssets";
	const IPPACCOUNTSUBTYPEENUM_OTHERLONGTERMLIABILITIES = "OtherLongTermLiabilities";
	const IPPACCOUNTSUBTYPEENUM_OTHERMISCELLANEOUSEXPENSE = "OtherMiscellaneousExpense";
	const IPPACCOUNTSUBTYPEENUM_OTHERMISCELLANEOUSINCOME = "OtherMiscellaneousIncome";
	const IPPACCOUNTSUBTYPEENUM_OTHERMISCELLANEOUSSERVICECOST = "OtherMiscellaneousServiceCost";
	const IPPACCOUNTSUBTYPEENUM_OTHERPRIMARYINCOME = "OtherPrimaryIncome";
	const IPPACCOUNTSUBTYPEENUM_OWNERSEQUITY = "OwnersEquity";
	const IPPACCOUNTSUBTYPEENUM_PAIDINCAPITALORSURPLUS = "PaidInCapitalOrSurplus";
	const IPPACCOUNTSUBTYPEENUM_PARTNERCONTRIBUTIONS = "PartnerContributions";
	const IPPACCOUNTSUBTYPEENUM_PARTNERDISTRIBUTIONS = "PartnerDistributions";
	const IPPACCOUNTSUBTYPEENUM_PARTNERSEQUITY = "PartnersEquity";
	const IPPACCOUNTSUBTYPEENUM_PAYROLLCLEARING = "PayrollClearing";
	const IPPACCOUNTSUBTYPEENUM_PAYROLLEXPENSES = "PayrollExpenses";
	const IPPACCOUNTSUBTYPEENUM_PAYROLLTAXPAYABLE = "PayrollTaxPayable";
	const IPPACCOUNTSUBTYPEENUM_PENALTIESSETTLEMENTS = "PenaltiesSettlements";
	const IPPACCOUNTSUBTYPEENUM_PREFERREDSTOCK = "PreferredStock";
	const IPPACCOUNTSUBTYPEENUM_PREPAIDEXPENSES = "PrepaidExpenses";
	const IPPACCOUNTSUBTYPEENUM_PREPAIDEXPENSESPAYABLE = "PrepaidExpensesPayable";
	const IPPACCOUNTSUBTYPEENUM_PROMOTIONALMEALS = "PromotionalMeals";
	const IPPACCOUNTSUBTYPEENUM_RENTORLEASEOFBUILDINGS = "RentOrLeaseOfBuildings";
	const IPPACCOUNTSUBTYPEENUM_RENTSHELDINTRUST = "RentsHeldInTrust";
	const IPPACCOUNTSUBTYPEENUM_RENTSINTRUSTLIABILITY = "RentsInTrustLiability";
	const IPPACCOUNTSUBTYPEENUM_REPAIRMAINTENANCE = "RepairMaintenance";
	const IPPACCOUNTSUBTYPEENUM_RETAINAGE = "Retainage";
	const IPPACCOUNTSUBTYPEENUM_RETAINEDEARNINGS = "RetainedEarnings";
	const IPPACCOUNTSUBTYPEENUM_SALESOFPRODUCTINCOME = "SalesOfProductIncome";
	const IPPACCOUNTSUBTYPEENUM_SALESTAXPAYABLE = "SalesTaxPayable";
	const IPPACCOUNTSUBTYPEENUM_SAVINGS = "Savings";
	const IPPACCOUNTSUBTYPEENUM_SECURITYDEPOSITS = "SecurityDeposits";
	const IPPACCOUNTSUBTYPEENUM_SERVICEFEEINCOME = "ServiceFeeIncome";
	const IPPACCOUNTSUBTYPEENUM_SHAREHOLDERNOTESPAYABLE = "ShareholderNotesPayable";
	const IPPACCOUNTSUBTYPEENUM_SHIPPINGFREIGHTDELIVERY = "ShippingFreightDelivery";
	const IPPACCOUNTSUBTYPEENUM_SHIPPINGFREIGHTDELIVERYCOS = "ShippingFreightDeliveryCos";
	const IPPACCOUNTSUBTYPEENUM_STATELOCALINCOMETAXPAYABLE = "StateLocalIncomeTaxPayable";
	const IPPACCOUNTSUBTYPEENUM_SUPPLIESMATERIALS = "SuppliesMaterials";
	const IPPACCOUNTSUBTYPEENUM_SUPPLIESMATERIALSCOGS = "SuppliesMaterialsCogs";
	const IPPACCOUNTSUBTYPEENUM_TAXESPAID = "TaxesPaid";
	const IPPACCOUNTSUBTYPEENUM_TAXEXEMPTINTEREST = "TaxExemptInterest";
	const IPPACCOUNTSUBTYPEENUM_TRAVEL = "Travel";
	const IPPACCOUNTSUBTYPEENUM_TRAVELMEALS = "TravelMeals";
	const IPPACCOUNTSUBTYPEENUM_TREASURYSTOCK = "TreasuryStock";
	const IPPACCOUNTSUBTYPEENUM_TRUSTACCOUNTS = "TrustAccounts";
	const IPPACCOUNTSUBTYPEENUM_TRUSTACCOUNTSLIABILITIES = "TrustAccountsLiabilities";
	const IPPACCOUNTSUBTYPEENUM_UNDEPOSITEDFUNDS = "UndepositedFunds";
	const IPPACCOUNTSUBTYPEENUM_UTILITIES = "Utilities";
	const IPPACCOUNTSUBTYPEENUM_VEHICLES = "Vehicles";

} // end class IPPAccountSubTypeEnum
