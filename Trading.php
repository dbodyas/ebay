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
        
        // BuyerRequirementDetails
        $request .= $this->_BuyerRequirementDetails();
        
        // CategoryBasedAttributesPrefill
        $request .= $this->_CategoryBasedAttributesPrefill();
        
        // CategoryMappingAllowed
        $request .= $this->_CategoryMappingAllowed();
        
        // Charity
        $request .= $this->_Charity();
        
        // ConditionID
        $request .= $this->_ConditionID();
        
        // Country
        $required_request = $this->_required('Country', $this->_Country());
        if($required_request == FALSE){
            return FALSE;
        }
        $request .= $required_request;
        
        // CrossBorderTrade
        $request .= $this->_CrossBorderTrade();
        
        // Currency
        $required_request = $this->_required('Currency', $this->_Currency());
        if($required_request == FALSE){
            return FALSE;
        }
        $request .= $required_request;
        
        // Description
        $request .= $this->_Description();
        
        // DisableBuyerRequirements
        $request .= $this->_DisableBuyerRequirements();
        
        // DiscountPriceInfo
        $request .= $this->_DiscountPriceInfo();
        
        // DispatchTimeMax
        $request .= $this->_DispatchTimeMax();
        
        // ExternalproductID
        $request .= $this->_ExternalProductID();
        
        // GetItFast
        $request .= $this->_GetItFast();
        
        // GiftIcon
        $request .= $this->_GiftIcon();
        
        // GiftServices
        $request .= $this->_GiftServices();
        
        // HitCounter
        $request .= $this->_HitCounter();
        
        // InventoryTrackingMethod
        $request .= $this->_InventoryTrackingMethod();
        
        // ItemCompatibilityList
        $request .= $this->_ItemCompatibilityList();
        
        // ItemSpecifics
        $request .= $this->_ItemSpecifics();
        
        
        
        
        
        
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
     * BuyerRequirementDetails - Call Input Field
     * @access public
     * @param boolean $LinkedPayPalAccount
     * @param array $MaximumBuyerPolicyViolations
     * @param array $MaximumItemRequirements
     * @param array $MaximumUnpaidItemStrikesInfo
     * @param int $MinimumFeedbackScore
     * @param boolean $ShipToRegistrationCountry
     * @param array $VerifiedUserRequirements
     * @param boolean $ZeroFeedbackScore 
     */
    public function BuyerRequirementDetails(
            $LinkedPayPalAccount,
            $MaximumBuyerPolicyViolations = '',
            $MaximumItemRequirements = '',
            $MaximumUnpaidItemStrikesInfo = '',
            $MinimumFeedbackScore = '',
            $ShipToRegistrationCountry = '',
            $VerifiedUserRequirements = '',
            $ZeroFeedbackScore = ''){
        
        // LinkedPayPalAccount
        if(is_bool($LinkedPayPalAccount)){
            if($LinkedPayPalAccount){
                $this->input_fields['BuyerRequirementDetails']['LinkedPayPalAccount'] = '1';
            } else {
                $this->input_fields['BuyerRequirementDetails']['LinkedPayPalAccount'] = '0';
            }
        } else {
            if(strtolower($LinkedPayPalAccount) == 'true'){
                $this->input_fields['BuyerRequirementDetails']['LinekdPaypalAccount'] = '1';
            } else {
                $this->input_fields['BuyerRequirementDetails']['LinkedPayPalAccount'] = '0';
            }
        }
        
        // MaximumBuyerPolicyViolations
        if($MaximumBuyerPolicyViolations !== ''){
            
            $this->input_fields['BuyerRequirementDetails']['MaximumBuyerPolicyViolations']['Count'] = $MaximumBuyerPolicyViolations['Count'];
            $this->input_fields['BuyerRequirementDetails']['MaximumBuyerPolicyViolations']['Period'] = $MaximumBuyerPolicyViolations['Period'];
        }
        
        // MaximumItemRequirements
        if($MaximumItemRequirements !== ''){
            
            if(isset($MaximumItemRequirements['MaximumItemCount'])){
                $this->input_fields['BuyerRequirementDetails']['MaximumItemRequirements']['MaximumItemCount'] = $MaximumItemRequirements['MaximumItemCount'];
            }
            
            if(isset($MaximumItemRequirements['MinimumFeedbackScore'])){
                $this->input_fields['BuyerRequirementDetails']['MaximumItemRequirements']['MinimumFeedbackScore'] = $MaximumItemRequirements['MinimumFeedbackScore'];
            }
        }
        
        // MaximumUnpaidItemStrikesInfo
        if($MaximumUnpaidItemStrikesInfo !== ''){
            
            if(isset($MaximumUnpaidItemStrikesInfo['Count'])){
                $this->input_fields['BuyerRequirementDetails']['MaximumUnpaidItemStrikesInfo']['Count'] = $MaximumUnpaidItemStrikesInfo['Count'];
            }
            
            if(isset($MaximumUnpaidItemStrikesInfo['Period'])){
                $this->input_fields['BuyerRequirementDetails']['MaximumUnpaidItemStrikesInfo']['Period'] = $MaximumUnpaidItemStrikesInfo['Period'];
            }
        }
        
        // MinimumFeedbackScore
        if($MinimumFeedbackScore !== ''){
            
            $this->input_fields['BuyerRequirementDetails']['MinimumFeedbackScore'] = $MinimumFeedbackScore;
        }
        
        // ShipToRegistrationCountry
        if($ShipToRegistrationCountry !== ''){
            
            if(is_bool($ShipToRegistrationCountry)){
                if($ShipToRegistrationCountry){
                    $this->input_fields['BuyerRequirementDetails']['ShipToRegistrationCountry'] = '1';
                } else {
                    $this->input_fields['BuyerRequirementDetails']['ShipToRegistrationCountry'] = '0';
                }
            } else {
                if(strtolower($ShipToRegistrationCountry) == 'true'){
                    $this->input_fields['BuyerRequirementDetails']['ShipToRegistrationCountry'] = '1';
                } else {
                    $this->input_fields['BuyerRequirementDetails']['ShipToRegistrationCountry'] = '0';
                }
            }
        }
        
        // VerifiedUserRequirements
        if($VerifiedUserRequirements !== ''){
            
            $this->input_fields['BuyerRequirementDetails']['VerifiedUserRequirements']['MinimumFeedbackScore'] = $VerifiedUserRequirements['MinimumFeedbackScore'];
            
            if(is_bool($VerifiedUserRequirements['VerifiedUser'])){
                if($VerifiedUserRequirements['VerifiedUser']){
                    $this->input_fields['BuyerRequirementDetails']['VerifiedUserRequirements']['VerifiedUser'] = '1';
                } else {
                    $this->input_fields['BuyerRequirementDetails']['VerifiedUserRequirements']['VerifiedUser'] = '0';
                }
            } else {
                if(strtolower($VerifiedUserRequirements['VerifiedUser']) == 'true'){
                    $this->input_fields['BuyerRequirementDetails']['VerifiedUserRequirements']['VerifiedUser'] = '1';
                } else {
                    $this->input_fields['BuyerRequirementDetails']['VerifiedUserRequirements']['VerifiedUser'] = '0';
                }
            }
        }
        
        // ZeroFeedbackScore
        if($ZeroFeedbackScore !== ''){
            
            if(is_bool($ZeroFeedbackScore)){
                if($ZeroFeedbackScore){
                    $this->input_fields['BuyerRequirementDetails']['ZeroFeedbackScore'] = '1';
                } else {
                    $this->input_fields['BuyerRequirementDetails']['ZeroFeedbackScore'] = '0';
                }
            } else {
                if(strtolower($ZeroFeedbackScore) == 'true'){
                    $this->input_fields['BuyerRequirementDetails']['ZeroFeedbackScore'] = '1';
                } else {
                    $this->input_fields['BuyerRequirementDetails']['ZeroFeedbackScore'] = '0';
                }
            }
        }

    }
    
    /**
     * CategoryBasedAttributesPrefill - Call Input Field
     * @access public
     * @param boolean $CategoryBasedAttributesPrefill 
     */
    public function CategoryBasedAttributesPrefill($CategoryBasedAttributesPrefill){
        
        if(is_bool($CategoryBasedAttributesPrefill)){
                if($CategoryBasedAttributesPrefill){
                    $this->input_fields['CategoryBasedAttributesPrefill'] = '1';
                } else {
                    $this->input_fields['CategoryBasedAttributesPrefill'] = '0';
                }
            } else {
                if(strtolower($CategoryBasedAttributesPrefill) == 'true'){
                    $this->input_fields['CategoryBasedAttributesPrefill'] = '1';
                } else {
                    $this->input_fields['CategoryBasedAttributesPrefill'] = '0';
                }
            }
    }
    
    /**
     * CategoryMappingAllowed - Call Input Field
     * @access public
     * @param boolean $CategoryMappingAllowed 
     */
    public function CategoryMappingAllowed($CategoryMappingAllowed){
        
        if(is_bool($CategoryMappingAllowed)){
            if($CategoryMappingAllowed){
                $this->input_fields['CategoryMappingAllowed'] = '1';
            } else {
                $this->input_fields['CategoryMappingAllowed'] = '0';
            }
        } else {
            if(strtolower($CategoryMappingAllowed) == 'true'){
                $this->input_fields['CategoryMappingAllowed'] = '1';
            } else {
                $this->input_fields['CategoryMappingAllowed'] = '0';
            }
        }
    }
    
    /**
     * Charity - Call Input Field
     * @access public
     * @param string $CharityID
     * @param int $CharityNumber
     * @param float $DonationPercent 
     */
    public function Charity($CharityID,$CharityNumber = '',$DonationPercent = 10.0){
        
        $this->input_fields['Charity']['CharityID'] = $CharityID;
        
        if($CharityNumber !== ''){
            
            $this->input_fields['Charity']['CharityNumber'] = $CharityNumber;
        }
        
        $this->input_fields['Charity']['DonationPercent'] = $DonationPercent;
        
    }
    
    /**
     * ConditionID - Call Input Field
     * @access public
     * @param int $ConditionID 
     */
    public function ConditionID($ConditionID){
        
        $this->input_fields['ConditionID'] = $ConditionID;
    }
    
    /**
     * Country - Call Input Field
     * @access public
     * @param string $Country 
     */
    public function Country($Country){
        
        $this->input_fields['Country'] = $Country;
    }
    
    /**
     * CrossBorderTrade - Call Input Field
     * @access public
     * @param array $CorssBorderTrade
     */
    public function CrossBorderTrade($CrossBorderTrade){
        
        if(is_array($CrossBorderTrade)){
            
            foreach($CrossBorderTrade as $cbt){
                
                $this->input_fields['CrossBorderTrade'][] = $cbt;
            }
            
        } else {
            
            $this->input_fields['CrossBorderTrade'] = array($CrossBorderTrade);
        }
        
    }
    
    /**
     * Currency - Call Input Field
     * @access public
     * @param string $Currency 
     */
    public function Currency($Currency){
        
        $this->input_fields['Currency'] = $Currency;
    }
    
    /**
     * Description - Call Input Field
     * @access public
     * @param string $Description 
     */
    public function Description($Description){
        $this->input_fields['Description'] = $Description;
    }
    
    /**
     * DisableBuyerRequirements - Call Input Field
     * @access public
     * @param boolean $DisableBuyerRequirements 
     */
    public function DisableBuyerRequirements($DisableBuyerRequirements){
        
        if(is_bool($DisableBuyerRequirements)){
            if($DisableBuyerRequirements){
                $this->input_fields['DisableBuyerRequirements'] = '1';
            } else {
                $this->input_fields['DisableBuyerRequirements'] = '0';
            }
        } else {
            if(strtolower($DisableBuyerRequirements) == 'true'){
                $this->input_fields['DisableBuyerRequirements'] = '1';
            } else {
                $this->input_fields['DisableBuyerRequirements'] = '0';
            }
        }
    }
    
    /**
     * DiscountPriceInfo - Call Input Field
     * @access public
     * @param double $MadeForOutletComparisonPrice
     * @param double $MinimumAdvertisedPrice
     * @param string $MinimumAdvertisedPriceExposure
     * @param double $OriginalRetailPrice
     * @param boolean $SoldOffeBay
     * @param boolean $SoldOneBay 
     */
    public function DiscountPriceInfo($MadeForOutletComparisonPrice = '',$MinimumAdvertisedPrice = '',$MinimumAdvertisedPriceExposure = '',$OriginalRetailPrice = '',$SoldOffeBay = '',$SoldOneBay = ''){
        
        // MadeForOutletComparisonPrice
        if($MadeForOutletComparisonPrice !==''){
            $this->input_fields['DiscountPriceInfo']['MadeForOutletComparisonPrice'] = $MadeForOutletComparisonPrice;
        }
        
        // MinimumAdvertisedPrice
        if($MinimumAdvertisedPrice !== ''){            
            $this->input_fields['DiscountPriceInfo']['MinimumAdvertisedPrice'] = $MinimumAdvertisedPrice;
        }
        
        // MinimumAdvertisedPriceExposure
        if($MinimumAdvertisedPriceExposure !== ''){
            $this->input_fields['DiscountPriceInfo']['MinimumAdvertisedPriceExposure'] = $MinimumAdvertisedPriceExposure;
        }
        
        // OriginalRetailPrice
        if($OriginalRetailPrice !== ''){
            $this->input_fields['DiscountPriceInfo']['OriginalRetailPrice'] = $OriginalRetailPrice;
        }
        
        // SoldOffeBay
        if($SoldOffeBay !== ''){
            $this->input_fields['DiscountPriceInfo']['SoldOffeBay'] = $this->_get_boolean($SoldOffeBay);
        }
        
        // SoldOneBay
        if($SoldOneBay !== ''){
            $this->input_fields['DiscountPriceInfo']['SoldOneBay'] = $this->_get_boolean($SoldOneBay);
        }
        
        
    }
    
    /**
     * DispatchTimeMax - Call Input Field
     * @access public
     * @param int $DispatchTimeMix 
     */
    public function DispatchTimeMax($DispatchTimeMix){
        $this->input_fields['DispatchTimeMax'] = $DispatchTimeMix;
    }
    
    /**
     * ExternalProductID - Call Input Field
     * @access public
     * @param string $AlternateValue
     * @param boolean $ReturnSearchResultOnDuplicates
     * @param string $Type
     * @param string $Value 
     */
    public function ExternalProductID($AlternateValue = '',$ReturnSearchResultOnDuplicates = '',$Type = '',$Value = ''){
        
        if($AlternateValue !== ''){
            
            $this->input_fields['ExternalProductID']['AlternateValue'] = $AlternateValue;
        }
        
        if($ReturnSearchResultOnDuplicates !== ''){
            
            $this->input_fields['ExternalProductID']['ReturnSearchResultOnDuplicates'] = $this->_get_boolean($ReturnSearchResultOnDuplicates);
        }
        
        if($Type !== ''){
            
            $this->input_fields['ExternalProductID']['Type'] = $Type;
        }
        
        if($Value !== ''){
            
            $this->input_fields['ExternalProductID']['Value'] = $Value;
        }
    }
    
    /**
     * GetItFast - Call Input Field
     * @access public
     * @param boolean $GetItFast 
     */
    public function GetItFast($GetItFast){
        $this->input_fields['GetItFast'] = $this->_get_boolean($GetItFast);
    }
    
    /**
     * GiftIcon - Call Input Field
     * @access public
     * @param int $GiftIcon 
     */
    public function GiftIcon($GiftIcon){
        $this->input_fields['GiftIcon'] = $GiftIcon;
        
    }
    
    /**
     * GiftServices - Call Input Field
     * @access public
     * @param string $GiftServices 
     */
    public function GiftServices($GiftServices){
        
        if(is_array($GiftServices)){
            
            foreach($GiftServices as $gs){
                $this->input_fields['GiftServices'][] = $gs;
            }
            
        } else {
            
            $this->input_fields['GiftServices'][] = $GiftServices;
        }
        
    }
    
    /**
     * HitCounter - Call Input Field
     * @access public
     * @param string $HitCounter 
     */
    public function HitCounter($HitCounter){
        $this->input_fields['HitCounter'] = $HitCounter;
    }
    
    /**
     * InventoryTrackingMethod - Call Input Field
     * @access public
     * @param string $InventoryTrackingMethod 
     */
    public function InventoryTrackingMethod($InventoryTrackingMethod){
        $this->input_fields['InventoryTrackingMethod'] = $InventoryTrackingMethod;
    }
    
    /**
     * ItemCompatibilityList - Call Input Field
     * @access public
     * @param array $Compatibility
     * @param boolean $ReplaceAll 
     */
    public function ItemCompatibilityList($Compatibility = '',$ReplaceAll = ''){
        $this->input_fields['ItemCompatibilityList']['Compatibility'] = $Compatibility;
        $this->input_fields['ItemCompatibilityList']['ReplaceAll'] = $this->_get_boolean($ReplaceAll);
        
    }
    
    /**
     * ItemSpecifics - Call Input Field
     * @access public
     * @param array $NameValueList 
     */
    public function ItemSpecifics($NameValueList = ''){
        $this->input_fields['ItemSpecifics']['NameValueList'] = $NameValueList;
        
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
     * BuyerRequirementDetails XML
     * @access private
     * @return string 
     */
    private function _BuyerRequirementDetails(){
        
        $BuyerRequirementDetails_string = '';
        
        if(isset($this->input_fields['BuyerRequirementDetails'])){
            
            $buyer_fields = $this->input_fields['BuyerRequirementDetails'];
            
            // Open
            $BuyerRequirementDetails_string .= '<BuyerRequirementDetails>';
            
            // LinkedPayPalAccount
            if(isset($buyer_fields['LinkedPayPalAccount'])){
                
                $BuyerRequirementDetails_string .= '<LinkedPayPalAccount>'.$buyer_fields['LinkedPayPalAccount'].'</LinkedPayPalAccount>';
            }
            
            // MaximumBuyerPolicyViolations
            if(isset($buyer_fields['MaximumBuyerPolicyViolations'])){
                
                $BuyerRequirementDetails_string .= '<MaximumBuyerPolicyViolations>';
                
                if(isset($buyer_fields['MaximumBuyerPolicyViolations']['Count'])){
                    
                    $BuyerRequirementDetails_string .= '<Count>'.$buyer_fields['MaximumBuyerPolicyViolations']['Count'].'</Count>';
                }
                
                if(isset($buyer_fields['MaximumBuyerPolicyViolations']['Period'])){
                    
                    $BuyerRequirementDetails_string .= '<Period>'.$buyer_fields['MaximumBuyerPolicyViolations']['Period'].'</Period>';
                }
                
                $BuyerRequirementDetails_string .= '</MaximumBuyerPolicyViolations>';                
            }
            
            // MaximumItemRequirements
            if(isset($buyer_fields['MaximumItemRequirements'])){
                
                $BuyerRequirementDetails_string .= '<MaximumItemRequirements>';
                
                if(isset($buyer_fields['MaximumItemRequirements']['MaximumItemCount'])){
                    
                    $BuyerRequirementDetails_string .= '<MaximumItemCount>'.$buyer_fields['MaximumItemRequirements']['MaximumItemCount'].'</MaximumItemCount>';
                }
                
                if(isset($buyer_fields['MaximumItemRequirements']['MaximumItemCount']) && isset($buyer_fields['MaximumItemRequirements']['MinimumFeedbackScore'])){
                    
                    $BuyerRequirementDetails_string .= '<MinimumFeedbackScore>'.$buyer_fields['MaximumItemRequirements']['MinimumFeedbackScore'].'</MinimumFeedbackScore>';
                }
                
                $BuyerRequirementDetails_string .= '</MaximumItemRequirements>';                
            }
            
            // MaximumUnpaidItemStrikesInfo
            if(isset($buyer_fields['MaximumUnpaidItemStrikesInfo'])){
                
                $BuyerRequirementDetails_string .= '<MaximumUnpaidItemStrikesInfo>';
                
                if(isset($buyer_fields['MaximumUnpaidItemStrikesInfo']['Count'])){
                
                    $BuyerRequirementDetails_string .= '<Count>'.$buyer_fields['MaximumUnpaidItemStrikesInfo']['Count'].'</Count>';
                }

                if(isset($buyer_fields['MaximumUnpaidItemStrikesInfo']['Period'])){

                    $BuyerRequirementDetails_string .= '<Period>'.$buyer_fields['MaximumUnpaidItemStrikesInfo']['Period'].'</Period>';
                }
                
                $BuyerRequirementDetails_string .= '</MaximumUnpaidItemStrikesInfo>';
            }
            
            // MinumumFeedbackScore
            if(isset($buyer_fields['MinimumFeedbackScore'])){
                
                $BuyerRequirementDetails_string .= '<MinimumFeedbackScore>'.$buyer_fields['MinimumFeedbackScore'].'</MinimumFeedbackScore>';
                
            }
            
            // ShipToRegistrationCountry
            if(isset($buyer_fields['ShipToRegistrationCountry'])){
                
                $BuyerRequirementDetails_string .= '<ShipToRegistrationCountry>'.$buyer_fields['ShipToRegistrationCountry'].'</ShipToRegistrationCountry>';
            }
            
            // VerifiedUserRequirements
            if(isset($buyer_fields['VerifiedUserRequirements'])){
                
                $BuyerRequirementDetails_string .= '<VerifiedUserRequirements>';
                
                if(isset($buyer_fields['VerifiedUserRequirements']['MinimumFeedbackScore'])){
                    
                    $BuyerRequirementDetails_string .= '<MinimumFeedbackScore>'.$buyer_fields['VerifiedUserRequirements']['MinimumFeedbackScore'].'</MinimumFeedbackScore>';
                }
                
                if(isset($buyer_fields['VerifiedUserRequirements']['VerifiedUser'])){
                    
                    $BuyerRequirementDetails_string .= '<VerifiedUser>'.$buyer_fields['VerifiedUserRequirements']['VerifiedUser'].'</VerifiedUser>';
                }
                
                $BuyerRequirementDetails_string .= '</VerifiedUserRequirements>';
            }
            
            
            // ZeroFeedbackScore
            if(isset($buyer_fields['ZeroFeedbackScore'])){
                
                $BuyerRequirementDetails_string .= '<ZeroFeedbackScore>'.$buyer_fields['ZeroFeedbackScore'].'</ZeroFeedbackScore>';
            }           
            
            
            // Close
            $BuyerRequirementDetails_string .= '</BuyerRequirementDetails>';
        }
        
        return $BuyerRequirementDetails_string;
    }
    
    /**
     * CategoryBasedAttributesPrefill XMl
     * @access private
     * @return string 
     */
    private function _CategoryBasedAttributesPrefill(){
        
        $CategoryBasedAttributesPrefill_string = '';
        
        if(isset($this->input_fields['CategoryBasedAttributesPrefill'])){
            
            $CategoryBasedAttributesPrefill_string .= '<CategoryBasedAttributesPrefill>'.$this->input_fields['CategoryBasedAttributesPrefill'].'</CategoryBasedAttributesPrefill>';
        }
        
        return $CategoryBasedAttributesPrefill_string;
    }
    
    /**
     * CategoryMappingAllowed XML
     * @access private
     * @return string
     */
    private function _CategoryMappingAllowed(){
        
        $CategoryMappingAllowed_string = '';
        
        if(isset($this->input_fields['CategoryMappingAllowed'])){
            
            $CategoryMappingAllowed_string = '<CategoryMappingAllowed>'.$this->input_fields['CategoryMappingAllowed'].'</CategoryMappingAllowed>';
        }
        
        return $CategoryMappingAllowed_string;
    }
    
    /**
     * Charity XML
     * @access private
     * @return string 
     */
    private function _Charity(){
        
        $Charty_string = '';
        
        if(isset($this->input_fields['Charity'])){
            
            // Open
            $Charty_string .= '<Charity>';
            
            $Charty_string .= '<CharityID>'.$this->input_fields['Charity']['CharityID'].'</CharityID>';
            
            if(isset($this->input_fields['Charity']['CharityNumber'])){
                
                $Charty_string .= '<CharityNumber>'.$this->input_fields['Charity']['CharityNumber'].'</CharityNumber>';
            }
            
            $Charty_string .= '<DonationPercent>'.$this->input_fields['Charity']['DonationPercent'].'</DonationPercent>';
            
            
            // Close
            $Charty_string .= '</Charity>';
        }
        
        return $Charty_string;
    }
    
    /**
     * ConditionID XML
     * @access private
     * @return string 
     */
    private function _ConditionID(){
        
        $ConditionID_string = '';
        
        if(isset($this->input_fields['ConditionID'])){
            
            $ConditionID_string .= '<ConditionID>'.$this->input_fields['ConditionID'].'</ConditionID>';
        }
        
        return $ConditionID_string;
    }
    
    /**
     * Country XMl
     * @access private
     * @return string 
     */
    private function _Country(){
        
        $Country_string = '';
        
        if(isset($this->input_fields['Country'])){
            
            $Country_string .= '<Country>'.$this->input_fields['Country'].'</Country>';
        }
        
        return $Country_string;
    }
    
    /**
     * CrossBorderTrade
     * @access private
     * @return string 
     */
    private function _CrossBorderTrade(){
        
        $CrossBorderTrade_string = '';
        
        if(isset($this->input_fields['CrossBorderTrade'])){
            
            foreach($this->input_fields['CrossBorderTrade'] as $cbt){
                
                $CrossBorderTrade_string .= '<CrossBorderTrade>'.$cbt.'</CrossBorderTrade>';
            }
        }
        
        return $CrossBorderTrade_string;
    }
    
    /**
     * Currency XML
     * @access private
     * @return string 
     */
    private function _Currency(){
        
        $Currency_string = '';
        
        if(isset($this->input_fields['Currency'])){
            
            $Currency_string .= '<Currency>'.$this->input_fields['Currency'].'</Currency>';
        }
        
        return $Currency_string;
    }
    
    /**
     * Description XML
     * @access private
     * @return string 
     */
    private function _Description(){
        
        $Description_string = '';
        
        if(isset($this->input_fields['Description'])){
            
            $Description_string .= '<Description>'.$this->input_fields['Description'].'</Description>';
        }
        
        return $Description_string;
    }
    
    /**
     * DisableBuyerRequirements XML
     * @access private
     * @return string 
     */
    private function _DisableBuyerRequirements(){
        
        $DisableBuyerRequirements_string = '';
        
        if(isset($this->input_fields['DisableBuyerRequirements'])){
            
            $DisableBuyerRequirements_string .= '<DisableBuyerRequirements>'.$this->input_fields['DisableBuyerRequirements'].'</DisableBuyerRequirements>';
        }
        
        return $DisableBuyerRequirements_string;
    }
    
    /**
     * DiscountPriceInfo
     * @access private
     * @return string 
     */
    private function _DiscountPriceInfo(){
        
        $DiscountPriceInfo_string = '';
        
        if(isset($this->input_fields['DiscountPriceInfo'])){
            
            // Open
            $DiscountPriceInfo_string .= '<DiscountPriceInfo>';
            
            if(isset($this->input_fields['DiscountPriceInfo']['MadeForOutletComparisonPrice'])){
                
                $DiscountPriceInfo_string .= '<MadeForOutletComparisonPrice>'.$this->input_fields['DiscountPriceInfo']['MadeForOutletComparisonPrice'].'</MadeForOutletComparisonPrice>';
            }
            
            if(isset($this->input_fields['DiscountPriceInfo']['MinimumAdvertisedPrice'])){
                
                $DiscountPriceInfo_string .= '<MinimumAdvertisedPrice>'.$this->input_fields['DiscountPriceInfo']['MinimumAdvertisedPrice'].'</MinimumAdvertisedPrice>';
            }
            
            if(isset($this->input_fields['DiscountPriceInfo']['MinimumAdvertisedPriceExposure'])){
                
                $DiscountPriceInfo_string .= '<MinimumAdvertisedPriceExposure>'.$this->input_fields['DiscountPriceInfo']['MinimumAdvertisedPriceExposure'].'</MinimumAdvertisedPriceExposure>';
            }
            
            if(isset($this->input_fields['DiscountPriceInfo']['OriginalRetailPrice'])){
                
                $DiscountPriceInfo_string .= '<OriginalRetailPrice>'.$this->input_fields['DiscountPriceInfo']['OriginalRetailPrice'].'</OriginalRetailPrice>';
            }
            
            if(isset($this->input_fields['DiscountPriceInfo']['SoldOffeBay'])){
                
                $DiscountPriceInfo_string .= '<SoldOffeBay>'.$this->input_fields['DiscountPriceInfo']['SoldOffeBay'].'</SoldOffeBay>';
            }
            
            if(isset($this->input_fields['DiscountPriceInfo']['SoldOneBay'])){
                
                $DiscountPriceInfo_string .= '<SoldOneBay>'.$this->input_fields['DiscountPriceInfo']['SoldOneBay'].'</SoldOneBay>';
            }
            
            // Close
            $DiscountPriceInfo_string .= '</DiscountPriceInfo>';
        }
        
        return $DiscountPriceInfo_string;
    }
    
    /**
     * DispatchTimeMax XML
     * @access private
     * @return string 
     */
    private function _DispatchTimeMax(){
        
        $DispatchTimeMax_string = '';
        
        if(isset($this->input_fields['DispatchTimeMax'])){
        
            $DispatchTimeMax_string .= '<DispatchTimeMax>'.$this->input_fields['DispatchTimeMax'].'</DispatchTimeMax>';
        }
        
        return $DispatchTimeMax_string;
    }
    
    /**
     * ExternalProductID XMl
     * @access private
     * @return string 
     */
    private function _ExternalProductID(){
        
        $ExternalProductID_string = '';
        
        if(isset($this->input_fields['ExternalProductID'])){
            
            // Open
            $ExternalProductID_string .=  '<ExternalProductID>';
            
            if(isset($this->input_fields['ExternalProductID']['AlternateValue'])){
                
                $ExternalProductID_string .= '<AlternateValue>'.$this->input_fields['ExternalProductID']['AlternateValue'].'</AlternateValue>';
            }
            
            if(isset($this->input_fields['ExternalProductID']['ReturnSearchResultOnDuplicates'])){
                
                $ExternalProductID_string .= '<ReturnSearchResultOnDuplicates>'.$this->input_fields['ExternalProductID']['ReturnSearchResultOnDuplicates'].'</ReturnSearchResultOnDuplicates>';
            }
            
            if(isset($this->input_fields['ExternalProductID']['Type'])){
                
                $ExternalProductID_string .= '<Type>'.$this->input_fields['ExternalProductID']['Type'].'</Type>';
            }
            
            if(isset($this->input_fields['ExternalProductID']['Value'])){
                
                $ExternalProductID_string .= '<Value>'.$this->input_fields['ExternalProductID']['Value'].'</Value>';
            }
            
            // Close
            $ExternalProductID_string .= '</ExternalProductID>';
        }
        
        return $ExternalProductID_string;
    }
    
    /**
     * GetItFast XML
     * @access private
     * @return string 
     */
    private function _GetItFast(){
        
        $GetItFast_string = '';
        
        if(isset($this->input_fields['GetItFast'])){
            
            $GetItFast_string .= '<GetItFast>'.$this->input_fields['GetItFast'].'</GetItFast>';
        }
        
        return $GetItFast_string;
        
    }
    
    /**
     * GiftIcon XML
     * @access private
     * @return string 
     */
    private function _GiftIcon(){
        
        $GiftIcon_string = '';
        
        if(isset($this->input_fields['GiftIcon'])){
            
            $GiftIcon_string .= '<GiftIcon>'.$this->input_fields['GiftIcon'].'</GiftIcon>';
        }
        
        return $GiftIcon_string;
    }
    
    /**
     * GiftServices XML
     * @access private
     * @return string 
     */
    private function _GiftServices(){
        
        $GiftServices_string = '';
        
        if(isset($this->input_fields['GiftServices'])){
            
            foreach($this->input_fields['GiftServices'] as $gs){
                $GiftServices_string .= '<GiftServices>'.$gs.'</GiftServices>';
            }
        }
        
        return $GiftServices_string;
    }
    
    /**
     * HitCounter XML
     * @access private
     * @return string 
     */
    private function _HitCounter(){
        
        $HitCounter_string = '';
        
        if(isset($this->input_fields['HitCounter'])){
            
            $HitCounter_string .= '<HitCounter>'.$this->input_fields['HitCounter'].'</HitCounter>';
        }
        
        return $HitCounter_string;
    }
    
    /**
     * InventoryTrackingMethod XML
     * @access private
     * @return string 
     */
    private function _InventoryTrackingMethod(){
        
        $InventoryTrackingMethod_string = '';
        
        if(isset($this->input_fields['InventoryTrackingMethod'])){
            
            $InventoryTrackingMethod_string .=  '<InventoryTrackingMethod>'.$this->input_fields['InventoryTrackingMethod'].'</InventoryTrackingMethod>';
        }
        
        return $InventoryTrackingMethod_string;
    }
    
    /**
     * ItemCompatibilityList XML
     * @access private
     * @return string 
     */
    private function _ItemCompatibilityList(){
        
        $ItemCompatibilityList_string = '';
        
        if(isset($this->input_fields['ItemCompatibilityList'])){
            
            $ItemCompatibilityList = $this->input_fields['ItemCompatibilityList'];
            
            // Open ItemCompatibilityList
            $ItemCompatibilityList_string .= '<ItemCompatibilityList>';
            
            // ItemCompatibilityList.Compatibility
            if(isset($ItemCompatibilityList['Compatibility'])){
                                
                foreach($ItemCompatibilityList['Compatibility'] as $Compatibility){
                    
                    // Open Compatibility
                    $ItemCompatibilityList_string .= '<Compatibility>';
                 
                    // Compatibility.CompatibilityNotes
                    if(isset($Compatibility['CompatibilityNotes'])){
                        $ItemCompatibilityList_string .= '<CompatibilityNotes>'.$Compatibility['CompatibilityNotes'].'</CompatibilityNotes>';
                    }
                    
                    // Compatibility.Delete
                    if(isset($Compatibility['Delete'])){
                        $ItemCompatibilityList_string .= '<Delete>'.$Compatibility['Delete'].'</Delete>';
                    }
                    
                    // Compatibility.NameValueList 
                    if(isset($Compatibility['NameValueList'])){
                        
                        foreach($Compatibility['NameValueList'] as $NameValueList ){
                            
                            // Open NameValueList
                            $ItemCompatibilityList_string .= '<NameValueList>';
                            
                            // NameValueList.Name
                            if(isset($NameValueList['Name'])){
                                $ItemCompatibilityList_string .= '<Name>'.$NameValueList['Name'].'</Name>';
                            }
                            
                            // NameValueList.Source
                            if(isset($NameValueList['Source'])){
                                $ItemCompatibilityList_string .= '<Source>'.$NameValueList['Source'].'</Source>';
                            }
                            
                            // NameValueList.Value
                            if(isset($NameValueList['Value'])){
                                
                                foreach($NameValueList['Value'] as $Value){
                                    $ItemCompatibilityList_string .= '<Value>'.$Value.'</Value>';
                                }
                            }
                            
                            // Close NameValueList
                            $ItemCompatibilityList_string .= '</NameValueList>';
                        }
                        
                    }
                    
                    // Close Compatibility
                    $ItemCompatibilityList_string .= '</Compatibility>';
                }
                
            }
            
            // ReplaceAll
            if(isset($ItemCompatibilityList['ReplaceAll'])){
                
                $ItemCompatibilityList_string .= '<ReplaceAll>'.$ItemCompatibilityList['ReplaceAll'].'</ReplaceAll>';
            }
            
            
            // Close ItemCompatibilityList
            $ItemCompatibilityList_string .= '</ItemCompatibilityList>';
        }
        
        
        return $ItemCompatibilityList_string;
    }
    
    /**
     * ItemSpecifics XML
     * @access private
     * @return string
     */
    private function _ItemSpecifics(){
        
        $ItemSpecifics_string = '';
        
        if(isset($this->input_fields['ItemSpecifics'])){
        
            // Open ItemSpecifics
            $ItemSpecifics_string .= '<ItemSpecifics>';
            
            // NameValueList
            if(isset($this->input_fields['ItemSpecifics']['NameValueList'])){
                
                foreach($this->input_fields['ItemSpecifics']['NameValueList'] as $NameValueList){
                    
                    // Open NameValueList
                    $ItemSpecifics_string .= '<NameValueList>';
                    
                    // Name
                    if(isset($NameValueList['Name'])){
                        $ItemSpecifics_string .= '<Name>'.$NameValueList['Name'].'</Name>';
                    }
                    
                    // Source
                    if(isset($NameValueList['Source'])){
                        $ItemSpecifics_string .= '<Source>'.$NameValueList['Source'].'</Source>';
                    }
                    
                    // Value
                    if(isset($NameValueList['Value'])){
                        
                        foreach($NameValueList['Value'] as $Value){
                            
                            $ItemSpecifics_string .= '<Value>'.$Value.'</Value>';
                        }
                    }
                    
                    // Close NameValueList
                    $ItemSpecifics_string .= '</NameValueList>';
                }
                
            }
            
            // Close ItemSpecifics
            $ItemSpecifics_string .= '</ItemSpecifics>';
        }
        
        return $ItemSpecifics_string;
        
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
     * Returns 1/0 for boolean check
     * @param string|boolean $field
     * @return int 
     */
    private function _get_boolean($field){
        
        $boolean = '';
        
        if(is_bool($field)){
            if($field){
                $boolean =  '1';
            } else {
                $boolean = '0';
            }
        } else {
            if(strtolower($field) == 'true'){
                $boolean = '1';
            } else {
                $boolean = '0';
            }
        }
        
        return $boolean;
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