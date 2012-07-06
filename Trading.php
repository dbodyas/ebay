<?php namespace rearley\Ebay;

/**
 * Ebay Trading API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package Trading API
 * @version 0.1.3 
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
    
    /**
     * AddDispute Call Reference
     * @access public
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/AddDispute.html
     * @return boolean 
     */
    public function AddDispute(){
        
        // Start Request
        $request = '<AddDisputeRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        
        // RequesterCredentials
        $request .= $this->_build_request_credentials();
        
        // ErrorLanguage
        $request .= trim($this->_ErrorLanguage());
        
        // MessageID
        $request .= trim($this->_MessageID());
        
        // WarningLevel
        $request .= trim($this->_WarningLevel());
        
        // DisputeExpanation
        $request_required = $this->_required('DisputeExpanation',trim($this->_DisputeExplanation()));
        if($request_required == FALSE){
            return FALSE;
        }
        $request .= $request_required;
        
        // Dispute Reason
        $request_required = $this->_required('DisputeReason', trim($this->_DisputeReason()));
        if($request_required == FALSE){
            return FALSE;
        }
        $request .= $request_required;
        
        /**
         * Either ItemID/TransactionID has to be set or OrderLineItemID 
         */
        if(isset($this->standard_input_fields['OrderLineItemID'])){
            
            $request .= trim($this->_OrderLineItemID());
            
        } else {
            
            // itemID and TransactionID BOTH have to be set
            if(isset($this->standard_input_fields['ItemID']) && isset($this->standard_input_fields['TransactionID'])){
                
                // ItemID
                $request .= trim($this->_ItemID());
                
                // TransactionID
                $request .= trim($this->_TransactionID());
                
            } else {
                
                // Report Error
                $this->error['function'] = 'AddDispute';
                $this->error['message'] = 'ItemID/TransactionID are required if not using OrderLineItemID.';
                return FALSE;                
            }            
        }        
        
        // End Request
        $request .= '</AddDisputeRequest>';
        
        echo $request;
        
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
     * MessageID - Standard Input Field
     * @access public
     * @param string $message_id 
     */
    public function MessageID($message_id){
        
        $this->standard_input_fields['MessageID'] = trim($message_id);
    }
    
    /**
     * WarningLevel - Standard Input Field
     * @access public
     * @param string $warning_level (high|low)
     */
    public function WarningLevel($warning_level){
        
        // standardize
        $warning_level = strtolower(trim($warning_level));
        
        // Can either be high or low. Default low for invaild input
        if($warning_level !== 'low' and $warning_level !== 'high'){
            $this->standard_input_fields['WarningLevel'] = 'low';
        } else {
            $this->standard_input_fields['WarningLevel'] = strtolower(trim($warning_level));
        }
        
    }
    
    /**
     * DisputeExplanation - Call Input Field
     * @access public
     * @param string $dispute_explanation 
     */
    public function DisputeExplanation($dispute_explanation){
        
        $this->standard_input_fields['DisputeExplanation'] = trim($dispute_explanation);        
    }
    
    /**
     * DisputeReason - Call Input Field
     * @access public
     * @param string $dispute_reason 
     */
    public function DisputeReason($dispute_reason){
        $this->standard_input_fields['DisputeReason'] = trim($dispute_reason);
    }
    
    /**
     * ItemID - Call Input Field
     * @access public
     * @param string $item_id 
     */
    public function ItemID($item_id){
        
        $this->standard_input_fields['ItemID'] = trim($item_id);
    }
    
    /**
     * OrderLineItemID - Call Input Field
     * @access public
     * @param string $OrderLineItemID
     */
    public function OrderLineItemID($OrderLineItemID){
        
        $this->standard_input_fields['OrderLineItemID'] = trim($OrderLineItemID);
    }
    
    /**
     * TransactionID - Call Input Field
     * @access public
     * @param string $TransactionID 
     */
    public function TransactionID($TransactionID){
        
        $this->standard_input_fields['TransactionID'] = trim($TransactionID);
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
     * Create MessagID XML
     * @access private
     * @return string 
     */
    private function _MessageID(){
        
        $MessageID_string = '';
        
        if(isset($this->standard_input_fields['MessageID'])){
            
            $MessageID_string = '<MessageID>'.$this->standard_input_fields['MessageID'].'</MessageID>';
        }
        
        return $MessageID_string;
    }
    
    /**
     * WarningLevel XML
     * @access private
     * @return string 
     */
    private function _WarningLevel(){
        
        $WarningLevel_string  = '';
        
        // Prevent from running in production enviroment
        if($this->sandbox_mode){
            
            if(isset($this->standard_input_fields['WarningLevel'])){

                $WarningLevel_string = '<WarningLevel>'.$this->standard_input_fields['WarningLevel'].'</WarningLevel>';
            }
        }
        
        return $WarningLevel_string;
    }
    
    /**
     * DisputeExplanation XML
     * @access private
     * @return string 
     */
    private function _DisputeExplanation(){
        
        $DisputeExplanation_string = '';
        
        if(isset($this->standard_input_fields['DisputeExplanation'])){
            
            $DisputeExplanation_string = '<DisputeExplanation>'.$this->standard_input_fields['DisputeExplanation'].'</DisputeExplanation>';
        }
        
        return $DisputeExplanation_string;        
    }
    
    /**
     * DisputeReason XML
     * @access private
     * @return string 
     */
    private function _DisputeReason(){
        
        $DisputeReason_string = '';
        
        if(isset($this->standard_input_fields['DisputeReason'])){
            
            $DisputeReason_string = '<DisputeReason>'.$this->standard_input_fields['DisputeReason'].'</DisputeReason>';
        }
        
        return $DisputeReason_string;
    }
    
    /**
     * ItemID XML
     * @access private
     * @return string 
     */
    private function _ItemID(){
        
        $ItemID_string = '';
        
        if(isset($this->standard_input_fields['ItemID'])){
            
            $ItemID_string = '<ItemID>'.$this->standard_input_fields['ItemID'].'</ItemID>';
        }
        
        return $ItemID_string;        
    }
    
    /**
     * OrderLineItemID XML
     * @access private
     * @return string 
     */
    private function _OrderLineItemID(){
        
        $OrderLineItemID_string = '';
        
        if(isset($this->standard_input_fields['OrderLineItemID'])){
            
            $OrderLineItemID_string = '<OrderLineItemID>'.$this->standard_input_fields['OrderLineItemID'].'</OrderLineItemID>';
        }
        
        return $OrderLineItemID_string;
    }
    
    /**
     * TransactionID XML
     * @access private
     * @return string 
     */
    private function _TransactionID(){
        
        $TransactionID_string = '';
        
        if(isset($this->standard_input_fields['TransactionID'])){
            
            $TransactionID_string = '<TransactionID>'.$this->standard_input_fields['TransactionID'].'</TransactionID>';
        }
        
        return $TransactionID_string;
    }
    
    
    
    
    /**
     * -----------------------
     * Misc Private Function 
     * ----------------------- 
     */
    
    /**
     * Check if a value is present
     * @param string $argument
     * @param string $value
     * @return boolean 
     */
    private function _required($argument,$value){
         
        if($value == ''){
            
            $this->error['function'] = 'AddDispute';
            $this->error['message'] = 'The argument '.$argument.' is required.';
            return FALSE;
            
        } else {
            
            return $value;
        }
    }
    
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