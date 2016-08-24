<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPAttachableCategoryEnum
 * @var IPPAttachableCategoryEnum
 * @xmlDefinition 
				Product: ALL
				Description: Category values for Attachable
			
 */
class IPPAttachableCategoryEnum
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
				if (property_exists('IPPAttachableCategoryEnum',$initPropName))
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
		public $value;	const IPPATTACHABLECATEGORYENUM_IMAGE = "Image";
	const IPPATTACHABLECATEGORYENUM_SIGNATURE = "Signature";
	const IPPATTACHABLECATEGORYENUM_CONTACT_PHOTO = "Contact Photo";
	const IPPATTACHABLECATEGORYENUM_RECEIPT = "Receipt";
	const IPPATTACHABLECATEGORYENUM_DOCUMENT = "Document";
	const IPPATTACHABLECATEGORYENUM_SOUND = "Sound";
	const IPPATTACHABLECATEGORYENUM_OTHER = "Other";

} // end class IPPAttachableCategoryEnum
