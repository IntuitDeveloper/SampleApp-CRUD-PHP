<?php

/**
 * Handles the fault tags in the response and handles them.
 */
class FaultHandler
{
	/**
	 * The Service Context
	 * @var ServiceContext context
	 */
    private $context;

	/**
	 * Initializes a new instance of the FaultHandler class.
	 * @param ServiceContext context
	 */
    public function __construct($context)
    {
        $this->context = $context;
    }
    
	/**
	 * Parses the Response and throws appropriate exceptions.
	 * @param WebException webException
	 * @param int StatusCode HTTP Response code
	 * @param bool isIpp
	 * @return IdsException
	 */
    public function ParseResponseAndThrowException($webException, $StatusCode, $isIpp = FALSE)
    {
        $idsException = NULL;

        // Checks whether the webException is null or not.
        if ($webException != NULL)
        {
            // Ids will set the following error codes. Depending on that we will be throwing specific exceptions.
            switch ($StatusCode)
            {
            	// HTTP OK: 200
            	case 200:
            		break;
                // Bad Request: 400
                case 400:
                // Unauthorized: 401
                case 401:
                // ServiceUnavailable: 503
                case 503:
                // InternalServerError: 500
                case 500:
                // Forbidden: 403
                case 403:
                // NotFound: 404
                case 404:
                // Default. Throw generic exception i.e. IdsException.
                default:
					$idsException = new IdsException("HTTP Response: $StatusCode");
					break;
            }
        }

        // Return the Ids Exception.
        return $idsException;
    }
}
?>