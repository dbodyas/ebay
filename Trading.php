<?php namespace rearley\Ebay;

/**
 * Ebay Trading API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package Trading API
 * @version 1.0 
 */
class Trading {
    
    /**
     * Gateway URI
     * @var array 
     */
    private $gateway_uri = array(
        'sandbox'=>'https://api.sandbox.ebay.com/ws/api.dll',
        'production'=>'https://api.ebay.com/ws/api.dll'
    );
    
    /**
     * By default, the library is set to sandbox mode for testing.
     * @var bool
     */
    private $sandbox_mode = TRUE;
    
    /**
     * Configurable Headers to be sent to the eBay API
     * @var array
     */
    private $headers = array();
    private $content_length = '';
    
    /**
     * Developer Information
     */
    private $developer_id = ''; //DevID
    private $application_id = ''; //AppID
    private $certificate_id = ''; //certID
    private $user_token ='';
    
    /**
     * Input Fields 
     */
    private $standard_input_fields = array();
    private $call_input_fields = array();    
    
    
    /**
     * Call Options 
     */
    private $call_reference = '';
    private $site_code = array(
        'site_id'=>'0',
        'abbreviation'=>'US',
        'curreny'=>'USD'
    ); //http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SiteCodeType.html
    
    
    /**
     * Responses
     */
    public $error = array();
    public $results = FALSE;
    
    
    function __construct(){
        
    }
    
    /**
     * ---------------------------------------------------
     * All Public Calls to a eBay Trading Call Reference
     * --------------------------------------------------- 
     */
    
    
    public function AddDispute(){
        
        // Start Request
        $request = '<AddDisputeRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        
        // RequesterCredentials
        $request .= $this->_build_request_credentials();
        
        // End Request
        $request .= '</AddDisputeRequest>';
        
    }
    
    
    
    
    
    
    
    /**
     * -------------------------------------
     * All Public Calls to Argument Inputs
     * ------------------------------------- 
     */
    
    /**
     * ErrorLanugage - Standard Input Field
     * @access public
     * @param string $error_language 
     */
    public function ErrorLanguage($error_language){
        
        $this->standard_input_fields['ErrorLanguage'] = trim($error_language);
        
    }
    
    
    
    
    
    
    
    /**
     * -----------------------------------------------------
     * Internal Function to build Call Reference Arguments
     * -----------------------------------------------------
     */
    
    
    /**
     * Creates ErrorLanguage XML
     * @access public
     * @return string 
     */
    private function _ErrorLanguage(){
        
        $ErrorLanguage_string = '';
        
        if(isset($this->standard_input_fields['ErrorLanguage'])){
            
            $ErrorLanguage_string = '<ErrorLanguage>'.$this->standard_input_fields['ErrorLanguage'].'</ErrorLanguage>';
            
        }
        
        return $ErrorLanguage_string;
        
    }
    
    
    
    
    /**
     * -----------------------
     * Misc Private Function 
     * ----------------------- 
     */
    
    /**
     * Build Headers
     * @access private
     * @todo generate an dpopulate content-length 
     */
    private function _build_headers(){
        
        $this->headers = array(
            'X-EBAY-API-COMPATIBILITY-LEVEL: 681',
            'X-EBAY-API-DEV-NAME: '.$this->developer_id,
            'X-EBAY-API-APP-NAME: '.$this->application_id,
            'X-EBAY-API-CERT-NAME: '.$this->certificate_id,
            'X-EBAY-API-CALL-NAME: '.$this->call_reference,
            'X-EBAY-API-SITEID: '.$this->site_code['site_id'],
            'Content-Type: "text/xml"',
            'Content-Length: '.$this->content_length
        );
        
    }
    
    /**
     * Builds the RequestCredentials XML
     * @access private 
     */
    private function _build_request_credentials(){
        
        $request = '<RequesterCredentials>';
        $request .= '<eBayAuthToken>'.$this->user_token.'</eBayAuthToken>';
        $request .= '</RequesterCredentials>';
        
        return $request;
    }
    
    /**
     * Sends request to Ebay
     * @param string $url
     * @param array $headers
     * @param string $postData
     * @return bool|string 
     */
    private function _send($postData) {
        
        // Build Rquest
        $postData = '<?xml version="1.0" encoding="utf-8"?>'.$postData;
        
        // Build Headers
        $this->content_length = strlen($postData);
        $this->_build_headers();
        
        // Get URL
        $url = '';
        if($this->sandbox_mode){
            $url = $this->gateway_uri['sandbox'];
        } else {
            $url = $this->gateway_uri['production'];
        }
        
        // Setup
        $ch = curl_init();

        // Options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        // Execute
        $response = curl_exec($ch);

        // Report Errors
        if (curl_errno($ch) !== 0) {

            $this->error['function'] = 'Send';
            $this->error['number'] = curl_errno($ch);
            $this->error['message'] = curl_error($ch);
            $this->error['curl_info'] = curl_getinfo($ch);

            $response = FALSE;
        }

        // Close
        curl_close($ch);
        $this->results = $response;
        return TRUE;
    }
    
}