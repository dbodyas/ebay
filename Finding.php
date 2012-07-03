<?php namespace rearley\Ebay;

/**
 * Ebay Finding API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package Finding API
 * @version 1.0 
 */
class Finding {

    /**
     * Error Report Array
     * @var array
     * @access public 
     */
    public $error = FALSE;
    
    /**
     * Holds the Response Object from Ebay
     * @var string
     */
    public $results = FALSE;

    /**
     * Application ID Given by Ebay
     * @var string
     * @access private 
     */
    private $appID = '';
    
    /**
     * Format of the REQUEST/RESPONSE data
     * @var string 
     */
    private $request_format = 'XML';

    /**
     * Acceptable formats that the API can handle
     * @param array
     * @access private
     */
    private $accepted_formats = array(
        'XML' => TRUE,
        'JSON' => FALSE,
        'SOAP' => FALSE
    );

    /**
     * Call References for the Finding API
     * @var array
     * @access private 
     */
    private $valid_call_types = array(
        'findCompletedItems' => FALSE,
        'findItemsAdvanced' => FALSE,
        'findItemsByCategory' => FALSE,
        'findItemsByImage' => FALSE,
        'findItemsByKeywords' => TRUE,
        'findItemsByProduct' => FALSE,
        'findItemsIneBayStores' => FALSE,
        'getHistograms' => TRUE,
        'getSearchKeywordsRecommendation' => FALSE,
        'getVersion' => FALSE
    );
    
    /**
     * Production and Sandbox URLs for each API
     * @access private
     * @var array 
     */
    private $api_urls = array(
        
        'finding'=>array(
            'production'=>'http://svcs.ebay.com/services/search/FindingService/v1',
            'sandbox'=>'http://svcs.sandbox.ebay.com/services/search/FindingService/v1'
            )
        
        );   
    
    public function __construct($appID,$request_format = 'XML') {
        $this->appID = $appID;
        $this->request_format = $request_format;
        
    }

    /**
     * Ebay Finding API
     * @param string $callReference
     * @param string $format
     * @param bool $sandbox
     * @return mixed 
     */
    public function search($call_options, $standard_options = FALSE, $sandbox = FALSE) {
        
        // Check Call Options / Type
        if($this->_check_call_type($call_options) == FALSE){
            return FALSE;
        }
        
        // API URL
        if ($sandbox) {

            $call_options['url'] = $this->api_urls['finding']['sandbox'];
            
        } else {

            $call_options['url'] = $this->api_urls['finding']['production'];
        }
        
        // Headers
        $call_options['headers'] = array(
            'X-EBAY-SOA-OPERATION-NAME: '.$call_options['call_type'].'',
            "X-EBAY-SOA-SERVICE-VERSION:1.3.0",
            "X-EBAY-SOA-GLOBAL-ID: EBAY-US",
            "X-EBAY-SOA-REQUEST-DATA-FORMAT: $this->request_format",
            "X-EBAY-SOA-RESPONSE-DATA-FORMAT: $this->request_format",
            "X-EBAY-SOA-SECURITY-APPNAME: $this->appID"
        );
        
        // Process Request
        $method_call = '_'.$call_options['call_type'];
        
        if($standard_options === FALSE){
            
            $response = $this->$method_call($call_options);
            
        } else {
            
            $response = $this->$method_call($call_options,$standard_options);
        }
                
        return $response;
                    
    }
    
    /**
     * Request creation for the finditemsByKeyword Finding APi
     * @return boolean 
     */
    private function _findItemsByKeywords($call_options,$standard_options){
        
        // Open Request
        $request = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $request .= "<findItemsByKeywordsRequest xmlns=\"http://www.ebay.com/marketplace/search/v1/services\">";
        
        // Standard Options
        $standard_options_string = $this->_process_standard_options($standard_options);
        if( $standard_options_string !== FALSE){
            
            $request .= $standard_options_string;
            
        } else {
            
            return FALSE;
        }
        
        // aspectFilter
        $result = $this->_process_aspectFilter($call_options);
        if($result !== FALSE){

            $request .= $result;
        }
        
        // domainFilter
        $result = $this->_process_domainFilter($call_options);
        if($result !== FALSE){

            $request .= $result;
        }
        
        // itemFilter
            
        // keywords (required)
        $result = $this->_process_keywords($call_options);
        if($result){
            
            $request .= $result;
            
        } else {
            
            return FALSE;
        }
        
        // outputSelector
        
        // Close Request
        $request .= "</findItemsByKeywordsRequest>\n";
                      
        // Send Request
        if($this->_send($call_options['url'], $call_options['headers'], $request)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * getHistograms Refeference Call
     * @param array $call_options
     * @param array $standard_options
     * @return boolean 
     */
    private function _getHistograms($call_options){
        
        // Open Request
        $request = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $request .= "<getHistogramsRequest xmlns=\"http://www.ebay.com/marketplace/search/v1/services\">";
               
        // categoryId
       if(isset($call_options['categoryId'])){
           
           $request .= '<categoryId>'.$call_options['categoryId'].'</categoryId>';
           
       } else {
           
           $this->error['function'] = 'PROCESS CALL OPTIONS';
           $this->error['message'] = 'categoryId is required.';
           return FALSE;
       }
        
        // Close Request
        $request .= "</getHistogramsRequest>\n";
                      
        // Send Request
        if($this->_send($call_options['url'], $call_options['headers'], $request)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Processes and Creates the XML string for the standard options
     * @param array $standard_options 
     */
    private function _process_standard_options($standard_options){
        
        $standard_options_string = '';
        
        if($standard_options !== FALSE){
            
            if(is_array($standard_options)){
                
                // Affiliate
                if(isset($standard_options['affiliate'])){
                    
                    $affiliate_string = $this->_affiliate($standard_options['affiliate']);
                    
                    if($affiliate_string === FALSE){
                        
                        return FALSE;
                        
                    } else {
                        
                        $standard_options_string .= $affiliate_string;
                    }
                }
                
                // buyerPostalCode
                if(isset($standard_options['buyerPostalCode'])){
                    $standard_options_string .= '<buyerPostalCode>'.$standard_options['buyerPostalCode'].'</buyerPostalCode>';
                }
                
                // paginationInput
                if(isset($standard_options['paginationInput'])){
                    
                    // open
                    $paginationInput = '<paginationInput>';
                    
                    // entriesPerPage
                    if(isset($standard_options['paginationInput']['entriesPerPage'])){
                        
                        $paginationInput .= '<entriesPerPage>'.$standard_options['paginationInput']['entriesPerPage'].'</entriesPerPage>';
                    }
                    
                    // pageNumber
                    if(isset($standard_options['paginationInput']['pageNumber'])){
                        
                        if($standard_options['paginationInput']['pageNumber'] <= 100 AND $standard_options['paginationInput']['pageNumber'] >= 1){
                            
                            $paginationInput .= '<pageNumber>'.$standard_options['paginationInput']['pageNumber'].'</pageNumber>';
                            
                        } else {
                            
                            $this->error['function'] = 'PROCESS STANDARD OPTIONS';
                            $this->error['message'] = 'PaginationInput->pageNumber cannot be less than 1 or greater than 100.';
                            return FALSE;                            
                        }
                        
                    }
                    
                    //close
                    $paginationInput .= '</paginationInput>';
                    
                    $standard_options_string .= $paginationInput;
                    
                }
                
                // sortOrder
                if(isset($standard_options['sortOrder'])){
                    
                    $valid_sort_order = array(
                        'BestMatch',
                        'BidCountFewest',
                        'BidCountMost',
                        'CountryAscending',
                        'CountryDescending',
                        'CurrentPriceHighest',
                        'DistanceNearest',
                        'EndTimeSoonest',
                        'PricePlusShippingHighest',
                        'PricePlusShippingLowest',
                        'StartTimeNewest'                      
                    );
                    
                    if(in_array($standard_options['sortOrder'], $valid_sort_order)){
                        
                        $standard_options_string .= '<sortOrder>'.$standard_options['sortOrder'].'</sortOrder>';
                        
                    } else {
                        
                        // Error
                        $this->error['function'] = 'PROCESS STANDARD OPTIONS';
                        $this->error['message'] = 'Invalid sort order.';
                        return FALSE;
                    }
                    
                }
                
                return $standard_options_string;
                
            } else {
                
                $this->error['function'] = 'PROCESS STANDARD OPTIONS';
                $this->error['message'] = 'The standard options are in a incorrect format.';
                return FALSE;
            }
            
        } else {
            
            return $standard_options_string;
        }
        
    }
    
    /**
     * Keyword Call Option
     * @param array $call_options
     * @return string|bool 
     */
    private function _process_keywords($call_options){
        
        if(isset($call_options['keywords'])){
            
            return '<keywords>'.$call_options['keywords'].'</keywords>';

        } else {
            
            $this->error['function'] = 'KEYWORDS';
            $this->error['message'] = ' keywords is a required field.';
            return FALSE;
        }
    }
    
    /**
     * aspectFilter Call Option
     * @access private
     * @param array $call_options
     * @return string|bool 
     */
    private function _process_aspectFilter($call_options){
        
        if(isset($call_options['aspectFilters'])){
            
            $aspect_filter_string = '<aspectFilter>';
            
            foreach($call_options['aspectFilters'] as $aspectFilter){
                
                $aspect_filter_string .= '<aspectName>'.$aspectFilter['aspectName'].'</aspectName>';
                
                foreach($aspectFilter['aspectValueNames'] as $aspectValueName){
                    
                    $aspect_filter_string .= '<aspectValueName>'.$aspectValueName.'</aspectValueName>';
                }                
            }
            
            $aspect_filter_string .= '</aspectFilter>';
            
            return $aspect_filter_string;
            
        } else {
            
            return FALSE;
        }
    }
    
    /**
     * domainFilter Call Option
     * @access private
     * @param array $call_options
     * @return string|bool 
     */
    private function _process_domainFilter($call_options){
        
        if(isset($call_options['domainFilters'])){
            
            $domain_filter_string = '';
            
            foreach($call_options['domainFilters'] as $domainFilter){
                $domain_filter_string .= '<domainFilter>';
                $domain_filter_string .= '<domainName>'.$domainFilter['domainName'].'</domainName>';
                $domain_filter_string .= '</domainFilter>';
            }
                       
            return $domain_filter_string;
            
        } else {
            
            return FALSE;
        }
    }
    
    /**
     * Builds and Validates Affiliate Options
     * @access private
     * @param array $affiliate
     * @return string|bool 
     */
    private function _affiliate($affiliate){
        
        // Build XML string
        $affiliate_string = '<affiliate>';
        
        // customId
        if(isset($affiliate['customId'])){
            
            if(strlen($affiliate['customId']) > 256){
                
                $this->error['function'] = 'PROCESS STANDARD OPTIONS';
                $this->error['message'] = 'Affiliate->CustomId can not be greater than 256 characters.';
                return FALSE;
                
            } else {
                
                $affiliate_string .= '<customId>'.$affiliate['customId'].'</customId>';
            }
        }
        
        // geoTargeting
        if(isset($affiliate['geoTargeting'])){
            
            if($affiliate['geoTargeting'] == 'TRUE' or $affiliate['geoTargeting'] == '1'){
                
                $affiliate_string .= '<geoTargeting>'.$affiliate['geoTargeting'].'</geoTargeting>';                
            }
        }
        
        // networkid
        if(isset($affiliate['networkId'])){
            
            $valid_networkid = array('2','3','4','5','6','7','8','9');
            
            if(in_array($affiliate['networkId'],$valid_networkid)){
                
                $affiliate_string .= '<networkId>'.$affiliate['networkId'].'</networkId>';
                
            } else {
                
                // Error
                $this->error['function'] = 'PROCESS STANDARD OPTIONS';
                $this->error['message'] = 'The networkId you entered is not a valid type.';
                return FALSE;
            }            
        }
        
        // trackingid
        if(isset($affiliate['trackingId'])){
            
            if(strlen($affiliate['trackingId']) <= 10){
                
                $affiliate_string .= '<trackingId>'.$affiliate['trackingId'].'</trackingId>';
                
            } else {
                
                // Error
                $this->error['function'] = 'PROCESS STANDARD OPTIONS';
                $this->error['message'] = 'The trackingId cannot be over 10 characters.';
                return FALSE;
            }
        }
                
        // Close
        $affiliate_string .= '</affiliate>';
        
        return $affiliate_string;
        
    }
    
    /**
     * Check is a valid call type has been passed.
     * @param array $call_options
     * @return boolean 
     */
    private function _check_call_type($call_options){
        
        // Check API Call Type
        if(is_array($call_options))
        {
            // API Call Type
            if(array_key_exists('call_type', $call_options)){
                
                // Call Type Valid
                if(array_key_exists($call_options['call_type'], $this->valid_call_types)){
                    
                    // Implemented
                    if(method_exists($this, '_'.$call_options['call_type'])){
                        
                        return TRUE;
                        
                    } else {
                        
                        // Error
                        $this->error['function'] = 'SEARCH';
                        $this->error['message'] = 'The call type '.$call_options['call_type'].' has not been implemented.';
                        return FALSE;
                        
                    }
                    
                } else {
                    
                    // Error
                    $this->error['function'] = 'SEARCH';
                    $this->error['message'] = 'The call type '.$call_options['call_type'].' is not valid.';
                    return FALSE;
                }
                
            } else {
                
                // Error
                $this->error['function'] = 'SEARCH';
                $this->error['message'] = 'No API Call Type Specified.';
                return FALSE;
            }
            
        } else {
            
            // Error
            $this->error['function'] = 'SEARCH';
            $this->error['message'] = 'No API Call options were specified or the options are in a incorrect format.';
            return FALSE;
        }
    }

    /**
     * Sends request to Ebay
     * @param string $url
     * @param array $headers
     * @param string $postData
     * @return bool|string 
     */
    private function _send($url, $headers, $postData) {

        // Setup
        $ch = curl_init();

        // Options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

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