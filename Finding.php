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
     * Call Options
     */
    private $call_type = 'findItemsByKeywords';
    private $aspectFilters = array();
    private $domainFilters = array();
    private $itemFilters = array();
    private $keywords = array();
    private $outputSelectors = array();
    private $categoryId = 0;
    
    /**
     * Standard Options 
     */
    private $affiliate = array();
    private $buyerPostalCode = '';
    private $paginationInput = array();
    private $sortOrder = array();
    
    /**
     * Send Options
     */
    private $url = '';
    private $headers = '';
    

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
    public function search($standard_options = FALSE, $sandbox = FALSE) {
        
        // Check Call Options / Type
        if($this->_check_call_type() == FALSE){
            return FALSE;
        }
        
        // API URL
        if ($sandbox) {

            $this->url = $this->api_urls['finding']['sandbox'];
            
        } else {

            $this->url = $this->api_urls['finding']['production'];
        }
        
        // Headers
        $this->headers = array(
            'X-EBAY-SOA-OPERATION-NAME: '.$this->call_type.'',
            "X-EBAY-SOA-SERVICE-VERSION:1.3.0",
            "X-EBAY-SOA-GLOBAL-ID: EBAY-US",
            "X-EBAY-SOA-REQUEST-DATA-FORMAT: $this->request_format",
            "X-EBAY-SOA-RESPONSE-DATA-FORMAT: $this->request_format",
            "X-EBAY-SOA-SECURITY-APPNAME: $this->appID"
        );
        
        // Process Request
        $method_call = '_'.$this->call_type;
        
        if($standard_options === FALSE){
            
            $response = $this->$method_call();
            
        } else {
            
            $response = $this->$method_call($standard_options);
        }
                
        return $response;
                    
    }
    
    /**
     * Request creation for the finditemsByKeyword Finding APi
     * @return boolean 
     */
    private function _findItemsByKeywords($standard_options = FALSE){
        
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
        $result = $this->_process_aspectFilter();
        if($result !== FALSE){

            $request .= $result;
        }
        
        // domainFilter
        $result = $this->_process_domainFilter();
        if($result !== FALSE){

            $request .= $result;
        }
        
        // itemFilter
        $result = $this->_process_itemFilter();
        if($result !== FALSE){
            $request .= $result;
        }
            
        // keywords (required)
        $result = $this->_process_keywords();
        if($result){
            
            $request .= $result;
            
        } else {
            
            return FALSE;
        }
        
        // outputSelector
        $result = $this->_process_outputSelector();
        if($result !== FALSE){
            $request .= $result;
        }
        
        // Close Request
        $request .= "</findItemsByKeywordsRequest>\n";
        
        echo $request;
                      
        // Send Request
        if($this->_send($this->url, $this->headers, $request)){
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
    private function _getHistograms(){
        
        // Open Request
        $request = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $request .= "<getHistogramsRequest xmlns=\"http://www.ebay.com/marketplace/search/v1/services\">";
               
        // categoryId
       $result = $this->_process_categoryId();
       if($result !== FALSE){
           $request .= $result;
       }
        
        // Close Request
        $request .= "</getHistogramsRequest>\n";
                      
        // Send Request
        if($this->_send($this->url, $this->headers, $request)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Configures the Finding Reference Call
     * @param type $call_type 
     */
    public function call_type($call_type){
        
        $this->call_type = $call_type;
    }
    
    /**
     * Clears all Call Options
     * @access public 
     */
    public function clear_call_options(){
        
        $this->aspectFilters = array();
        $this->domainFilters = array();
        $this->itemFilters = array();
        $this->outputSelectors = array();
    }
    
    /**
     * Adds an aspectFilter for the next call.
     * @access public
     * @param array $aspectFilter 
     */
    public function add_aspectFilter($aspectName,$aspectValueName){
        
        $this->aspectFilters[] = array('aspectName'=>$aspectName,'aspectValueName'=>$aspectValueName);        
    }
    
    /**
     * Adds a domainFilter as a call option
     * @access public
     * @param string $domainName 
     */
    public function add_domainFilter($domainName){
        
        $this->domainFilters = $domainName;        
    }
    
    /**
     * Adds a itemFilter as a call option
     * @access public
     * @param string $name
     * @param array|string $value
     * @param string $paramName
     * @param string $paramValue 
     */
    public function add_itemFilter($name,$value,$paramName = FALSE,$paramValue = FALSE){
        
        $filter['name'] = $name;
        
        if(is_array($value)){
            $filter['value'] = $value;
        } else {
            $filter['value'] = array($value);
        }
        
        if($paramName !== FALSE){
            $filter['paramName'] = $paramName;
            $filter['paramValue'] = $paramValue;
        }
        
        $this->itemFilters[] = $filter;
        
    }
    
    /**
     * Adds keywords to the call options
     * @access public
     * @param string|array $keywords 
     */
    public function add_keywords($keywords){
        
        if(is_array($keywords)){
            
            foreach($keywords as $keyword){
                
                $this->keywords[] = $keyword;
            }
            
        } else {
            
            $this->keywords[] = $keywords;
        }
    }
    
    /**
     * Adds a outputSelector as a call option
     * @access public
     * @param string|array $outputSelectorType 
     */
    public function add_outputSelector($outputSelectorType){
        
       if(is_array($outputSelectorType)){
           
           foreach($outputSelectorType as $type){
               $this->outputSelectors[] = $type;
           }
       } else {
           $this->outputSelectors[] = $outputSelectorType;
       }
        
    }
    
    /**
     * Adds categoryId to Call Options
     * @param type $categoryId 
     */
    public function add_categoryId($categoryId){
        
        $this->categoryId = $categoryId;
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
     * categoryId Call Option
     * @access private
     * @return string|boolean 
     */
    private function _process_categoryId(){
        
        if($this->categoryId !== 0){
            
            $category_id_string = '<categoryId>'.$this->categoryId.'</categoryId>';
            
            return $category_id_string;
            
        } else {
            
            return FALSE;
        }
    }
    
    /**
     * Keyword Call Option
     * @param array $call_options
     * @return string|bool 
     */
    private function _process_keywords(){
        
        if(!empty($this->keywords)){
            
            $keywords = '';
            foreach($this->keywords as $keyword){
                $keywords .= $keyword.' ';
            }
            
            return '<keywords>'.trim($keywords).'</keywords>';

        } else {
            
            $this->error['function'] = 'KEYWORDS';
            $this->error['message'] = ' keywords is a required field.';
            return FALSE;
        }
    }
    
    /**
     * aspectFilter Call Option
     * @access private
     * @return string|bool 
     */
    private function _process_aspectFilter(){
        
        if(!empty($this->aspectFilters)){
            
            $aspect_filter_string = '';
            
            foreach($this->aspectFilters as $aspectFilter){
                
                $aspect_filter_string .= '<aspectFilter>';
                
                $aspect_filter_string .= '<aspectName>'.$aspectFilter['aspectName'].'</aspectName>';
                
                foreach($aspectFilter['aspectValueName'] as $value){
                    
                    $aspect_filter_string .= '<aspectValueName>'.$value.'</aspectValueName>';                    
                }
                
                $aspect_filter_string .= '</aspectFilter>';
            }
            
            return $aspect_filter_string;
            
        } else {
            return FALSE;
        }        
    }
    
    /**
     * domainFilter Call Option
     * @access private
     * @return string|bool 
     */
    private function _process_domainFilter(){
        
        if(!empty($this->domainFilters)){
            
            $domain_filter_string = '<domainFilter><domainName>'.$this->domainFilters.'</domainName></domainFilter>';
            
            return $domain_filter_string;
            
        } else {
            return FALSE;
        }        
    }
    
    /**
     * itemFilter Call Option
     * @access private
     * @param array $call_options
     * @return string|bool 
     */
    private function _process_itemFilter(){
        
        if(!empty($this->itemFilters)){
            
            $item_filter_string = '';
         
            foreach($this->itemFilters as $itemFilter){
                
                $item_filter_string .= '<itemFilter>';
                
                $item_filter_string .= '<name>'.$itemFilter['name'].'</name>';
                
                if(isset($itemFilter['paramName'])){
                    $item_filter_string .= '<paramName>'.$itemFilter['paramName'].'</paramName>';
                }
                
                if(isset($itemFilter['paramValue'])){
                    $item_filter_string .= '<paramValue>'.$itemFilter['paramValue'].'</paramValue>';
                }                
                
                foreach($itemFilter['value'] as $value){
                    
                    $item_filter_string .= '<value>'.$value.'</value>';
                }
                
                $item_filter_string .= '</itemFilter>';            
                
            }
            
            return $item_filter_string;
            
        } else {
            
            return FALSE;
        }
        
    }
    
    /**
     * outputSelector Call Option
     * @access private
     * @param array $call_options
     * @return string|bool 
     */
    private function _process_outputSelector(){
        
        if(!empty($this->outputSelectors)){
            
            $output_selector_string = '';

            foreach($this->outputSelectors as $key=>$value){
                
                $output_selector_string .= '<outputSelector>'.$value.'</outputSelector>';                
            }
            
            return $output_selector_string;
        
            
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
    private function _check_call_type(){
        
        // Call Type Valid
        if(array_key_exists($this->call_type, $this->valid_call_types)){

            // Implemented
            if(method_exists($this, '_'.$this->call_type)){

                return TRUE;

            } else {

                // Error
                $this->error['function'] = 'SEARCH';
                $this->error['message'] = 'The call type '.$this->call_type.' has not been implemented.';
                return FALSE;

            }

        } else {

            // Error
            $this->error['function'] = 'SEARCH';
            $this->error['message'] = 'The call type '.$this->call_type.' is not valid.';
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