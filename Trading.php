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
    private $input_fields = array();   
    
    
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
        
        $this->call_reference = 'AddDispute';
        
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
        if(isset($this->input_fields['OrderLineItemID'])){
            
            $request .= trim($this->_OrderLineItemID());
            
        } else {
            
            // itemID and TransactionID BOTH have to be set
            if(isset($this->input_fields['ItemID']) && isset($this->input_fields['TransactionID'])){
                
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
        
        return $this->_send($request);      
               
    }
    
    /**
     * AddDisputeResponse Call Reference
     * @access public
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/AddDisputeResponse.html
     * @return boolean 
     */
    public function AddDisputeResponse(){
        
        $this->call_reference = 'AddDisputeResponse';
                
        // Open
        $request = '<AddDisputeResponseRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        
        // RequestCredentials
        $request .= $this->_build_request_credentials();
        
        // ErrorLanguage
        $request .= trim($this->_ErrorLanguage());
        
        // MessageID
        $request .= trim($this->_MessageID());
        
        // WarningLevel
        $request .= trim($this->_WarningLevel());
        
        // DisputeActivity
        $request_required = trim($this->_required('DisputeActivity', $this->_DisputeActivity()));
        if($request_required == FALSE){
            return FALSE;
        }
        $request .= $request_required;
        
        // DisputeID
        $request_required = trim($this->_required('DisputeID', $this->_DisputeID()));
        if($request_required == FALSE){
            return FALSE;
        }
        $request .= $request_required;
        
        /**
         * MessageText
         * Only required for certain activities 
         */
        if(isset($this->input_fields['DisputeActivity'])){
            
            // Required Activities
            $required_activities = array('SellerAddInformation','SellerComment','SellerPaymentNotReceived');
            
            if(in_array($this->input_fields['DisputeActivity'], $required_activities)){
                
                $request_required = trim($this->_required('MessageText', $this->_MessageText()));
                if($request_required == FALSE){
                    return FALSE;
                }
                $request .= $request_required;
            }
        }
        
        /*
         * ShipmentTrackNumber and ShippingCarrierUsed are required
         * if activity is SellerShippedItem
         */
        if(isset($this->input_fields['DisputeActivity']) && $this->input_fields['DisputeActivity'] == 'SellerShippedItem'){
            
            // ShipmentTrackNumber
            $request_required = trim($this->_required('ShipmentTrackNumber', $this->_ShipmentTrackNumber()));
            if($request_required == FALSE){
                return FALSE;
            }
            $request .= $request_required;
            
            // ShippingCarrierUsed
            $request_required = trim($this->_required('ShippingCarrierUsed', $this->_ShippingCarrierUsed()));
            if($request_required == FALSE){
                return FALSE;
            }
            $request .= $request_required;
            
            // ShippingTime
            $request_required = trim($this->_required('ShippingTime', $this->_ShippingTime()));
            if($request_required == FALSE){
                return FALSE;
            }
            $request .= $request_required;
        }
        
        // Close
        $request .= '</AddDisputeResponseRequest>';

        return $this->_send($request);
    }
    
    /**
     * AddFixedPriceItem Call Reference
     * @access public
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/AddFixedPriceItem.html
     * @return boolean 
     */
    public function AddFixedPriceItem(){
        
        $this->call_reference = 'AddFixedPriceItem';
        
        // Open
        $request = '<AddFixedPriceItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        
        // RequestCredentials
        $request .= $this->_build_request_credentials();
        
        // ErrorLanguage
        $request .= $this->_ErrorLanguage();
        
        // MessageID
        $request .= $this->_MessageID();
        
        // WarningLevel
        $request .= $this->_WarningLevel();
        
        // Start of Item Container
        $request .= '<Item>';
        
        // ApplicationData
        $request .= $this->_ApplicationData();
        
        // AutoPay
        $request .= $this->_AutoPay();
        
        // End of Item Container
        $request .= '</Item>';
        
        // Close
        $request .= '</AddFixedPriceItemRequest>';
        
        // Send
        echo $request;exit;
        return $this->_send($request);
    }
    
    
    
    
    
    /**
     * -------------------------------------
     * All Public Calls to Argument Inputs
     * ------------------------------------- 
     */
    
    /**
     * Set user token used on most trading calls
     * @access public
     * @param string $token 
     */
    public function UserToken($token){
        $this->user_token = $token;
    }
    
    /**
     * Set DevID
     * @access public
     * @param string $devid 
     */
    public function DevID($devid){
        $this->developer_id = trim($devid);
    }
    
    /**
     * Set AppID
     * @access public
     * @param string $appid 
     */
    public function AppID($appid){
        $this->application_id = trim($appid);
    }
    
    /**
     * Set CertID
     * @access public
     * @param string $certid 
     */
    public function CertID($certid){
        $this->certificate_id = trim($certid);
    }
    
    /**
     * ErrorLanugage - Standard Input Field
     * @access public
     * @param string $error_language 
     */
    public function ErrorLanguage($error_language){
        
        $this->input_fields['ErrorLanguage'] = trim($error_language);
        
    }
    
    /**
     * MessageID - Standard Input Field
     * @access public
     * @param string $message_id 
     */
    public function MessageID($message_id){
        
        $this->input_fields['MessageID'] = trim($message_id);
    }
    
    /**
     * WarningLevel - Standard Input Field
     * @access public
     * @param string $warning_level (high|low)
     */
    public function WarningLevel($warning_level){
        
        // standardize
        $warning_level = ucfirst(strtolower(trim($warning_level)));
        
        // Can either be high or low. Default low for invaild input
        if($warning_level !== 'Low' and $warning_level !== 'High'){
            $this->input_fields['WarningLevel'] = 'Low';
        } else {
            $this->input_fields['WarningLevel'] = $warning_level;
        }
        
    }
    
    /**
     * DisputeExplanation - Call Input Field
     * @access public
     * @param string $dispute_explanation 
     */
    public function DisputeExplanation($dispute_explanation){
        
        $this->input_fields['DisputeExplanation'] = trim($dispute_explanation);        
    }
    
    /**
     * DisputeReason - Call Input Field
     * @access public
     * @param string $dispute_reason 
     */
    public function DisputeReason($dispute_reason){
        $this->input_fields['DisputeReason'] = trim($dispute_reason);
    }
    
    /**
     * ItemID - Call Input Field
     * @access public
     * @param string $item_id 
     */
    public function ItemID($item_id){
        
        $this->input_fields['ItemID'] = trim($item_id);
    }
    
    /**
     * OrderLineItemID - Call Input Field
     * @access public
     * @param string $OrderLineItemID
     */
    public function OrderLineItemID($OrderLineItemID){
        
        $this->input_fields['OrderLineItemID'] = trim($OrderLineItemID);
    }
    
    /**
     * TransactionID - Call Input Field
     * @access public
     * @param string $TransactionID 
     */
    public function TransactionID($TransactionID){
        
        $this->input_fields['TransactionID'] = trim($TransactionID);
    }
    
    /**
     * DisputeActivity - Call Input Field
     * @access public
     * @param string $DisputeActivity 
     */
    public function DisputeActivity($DisputeActivity){
        
        $this->input_fields['DisputeActivity'] = trim($DisputeActivity);
    }
    
    /**
     * DisputeID - Call Input Field
     * @access public
     * @param string $DisputeID 
     */
    public function DisputeID($DisputeID){
        
        $this->input_fields['DisputeID'] = trim($DisputeID);
    }
    
    /**
     * MessageText - Call Input Field
     * @access public
     * @param string $MessageText 
     */
    public function MessageText($MessageText){
        $this->input_fields['MessageText'] = trim($MessageText);
    }
    
    /**
     * ShipmentTrackingNumber - Call Input Field
     * @access public
     * @param string $ShipmentTrackNumber 
     */
    public function ShipmentTrackNumber($ShipmentTrackNumber){
        $this->input_fields['ShipmentTrackNumber'] = trim($ShipmentTrackNumber);
    }
    
    /**
     * ShippingCarrierUsed - Call Input Field
     * @access public
     * @param string $ShippingCarrierUsed 
     */
    public function ShippingCarrierUsed($ShippingCarrierUsed){
        $this->input_fields['ShippingCarrierUsed'] = trim($ShippingCarrierUsed);
    }
    
    /**
     * ShippingTime - Call Input Field
     * @access public
     * @param dateTime $ShippingTime (YYYY-MM-DDTHH:MM:SS.SSSZ)
     */
    public function ShippingTime($ShippingTime){
        $this->input_fields['ShippingTime'] = trim($ShippingTime);
    }
    
    /**
     * ApplicationData - Call Input Field
     * @access public
     * @param string $ApplicationData (Max Length 32)
     */
    public function ApplicationData($ApplicationData){
        $this->input_fields['ApplicationData'] = trim($ApplicationData);
    }
    
    /**
     * AutoPay - Call Input Field
     * @access public
     * @param boolean $AutoPay 
     */
    public function AutoPay($AutoPay){
        
        if(is_bool($AutoPay)){
            if($AutoPay){
                $this->input_fields['AutoPay'] = '1';
            } else {
                $this->input_fields['AutoPay'] = '0';
            }
        } else {
            if(strtolower($AutoPay) == 'true'){
                $this->input_fields['AutoPay'] = '1';
            } else {
                $this->input_fields['AutoPay'] = '0';
            }
        }

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
        
        if(isset($this->input_fields['ErrorLanguage'])){
            
            $ErrorLanguage_string = '<ErrorLanguage>'.$this->input_fields['ErrorLanguage'].'</ErrorLanguage>';            
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
        
        if(isset($this->input_fields['MessageID'])){
            
            $MessageID_string = '<MessageID>'.$this->input_fields['MessageID'].'</MessageID>';
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
            
            if(isset($this->input_fields['WarningLevel'])){

                $WarningLevel_string = '<WarningLevel>'.$this->input_fields['WarningLevel'].'</WarningLevel>';
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
        
        if(isset($this->input_fields['DisputeExplanation'])){
            
            $DisputeExplanation_string = '<DisputeExplanation>'.$this->input_fields['DisputeExplanation'].'</DisputeExplanation>';
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
        
        if(isset($this->input_fields['DisputeReason'])){
            
            $DisputeReason_string = '<DisputeReason>'.$this->input_fields['DisputeReason'].'</DisputeReason>';
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
        
        if(isset($this->input_fields['ItemID'])){
            
            $ItemID_string = '<ItemID>'.$this->input_fields['ItemID'].'</ItemID>';
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
        
        if(isset($this->input_fields['OrderLineItemID'])){
            
            $OrderLineItemID_string = '<OrderLineItemID>'.$this->input_fields['OrderLineItemID'].'</OrderLineItemID>';
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
        
        if(isset($this->input_fields['TransactionID'])){
            
            $TransactionID_string = '<TransactionID>'.$this->input_fields['TransactionID'].'</TransactionID>';
        }
        
        return $TransactionID_string;
    }
    
    /**
     * DisputeActivity XML
     * @access private
     * @return string 
     */
    private function _DisputeActivity(){
        
        $DisputeActivity_string = '';
        
        if(isset($this->input_fields['DisputeActivity'])){
            
            $DisputeActivity_string = '<DisputeActivity>'.$this->input_fields['DisputeActivity'].'</DisputeActivity>';
        }
        
        return $DisputeActivity_string;
    }
    
    /**
     * DisputeID XML
     * @access private
     * @return string 
     */
    private function _DisputeID(){
        
        $DisputeID_string = '';
        
        if(isset($this->input_fields['DisputeID'])){
            
            $DisputeID_string = '<DisputeID>'.$this->input_fields['DisputeID'].'</DisputeID>';
        }
        
        return $DisputeID_string;
    }
    
    /**
     * MessageText XML
     * @access private
     * @return string 
     */
    private function _MessageText(){
        
        $MessageText_string = '';
        
        if(isset($this->input_fields['MessageText'])){
            
            $MessageText_string = '<MessageText>'.$this->input_fields['MessageText'].'</MessageText>';
        }
        
        return $MessageText_string;        
    }
    
    /**
     * ShipmentTrackNumber XML
     * @access private
     * @return string 
     */
    private function _ShipmentTrackNumber(){
        
        $ShipmentTrackNumber_string = '';
        
        if(isset($this->input_fields['ShipmentTrackNumber'])){
            
            $ShipmentTrackNumber_string = '<ShipmentTrackNumber>'.$this->input_fields['ShipmentTrackNumber'].'</ShipmentTrackNumber>';
        }
        
        return $ShipmentTrackNumber_string;
    }
    
    /**
     * ShippingCarrierUsed XML
     * @access private
     * @return string 
     */
    private function _ShippingCarrierUsed(){
        
        $ShippingCarrierUsed = '';
        
        if(isset($this->input_fields['ShippingCarrierUsed'])){
            
            $ShippingCarrierUsed = '<ShippingCarrierUsed>'.$this->input_fields['ShippingCarrierUsed'].'</ShippingCarrierUsed>';
        }
        
        return $ShippingCarrierUsed;
    }
    
    /**
     * ShippingTime XML
     * @access private
     * @return string 
     */
    private function _ShippingTime(){
        
        $ShippingTime_string = '';
        
        if(isset($this->input_fields['ShippingTime'])){
            
            $ShippingTime_string = '<ShippingTime>'.$this->input_fields['ShippingTime'].'</ShippingTime>';
        }
        
        return $ShippingTime_string;
    }
    
    /**
     * ApplicationData XML
     * @access private
     * @return string 
     */
    private function _ApplicationData(){
        
        $ApplicationData_string = '';
        
        if(isset($this->input_fields['ApplicationData'])){
            
            $ApplicationData_string = '<ApplicationData>'.$this->input_fields['ApplicationData'].'</ApplicationData>';
        }
        
        return $ApplicationData_string;        
    }
    
    /**
     * AutoPay XML
     * @access private
     * @return string 
     */
    private function _AutoPay(){
        
        $AutoPay_string = '';
        
        if(isset($this->input_fields['AutoPay'])){
            
            $AutoPay_string = '<AutoPay>'.$this->input_fields['AutoPay'].'</AutoPay>';
        }
        
        return $AutoPay_string;
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
            
            $this->error['function'] = $this->call_reference;
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
            //'Content-Type: "text/xml"',
            //'Content-Length: '.$this->content_length
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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

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
        
        if($response == FALSE){
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
}