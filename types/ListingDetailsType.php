<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ListingDetailsType
 */
class ListingDetailsType {
    
    // Fields
    private $Adult;
    private $BestOfferAutoAcceptPrice;
    private $BestOfferAutoAcceptPrice_AmountType;
    private $BindingAuction;
    private $BuyItNowAvailable;
    private $CheckoutEnabled;
    private $ConvertedBuyItNowPrice;
    private $ConvertedBuyItNowPrice_AmountType;
    private $ConvertedReservePrice;
    private $ConvertedReservePrice_AmountType;
    private $ConvertedStartPrice;
    private $ConvertedStartPrice_AmountType;
    private $EndTime;
    private $HasPublicMessages;
    private $HasReservePrice;
    private $HasUnansweredQuestions;
    private $LocalListingDistance;
    private $MinimumBestOfferMessage;
    private $MinimumBestOfferPrice;
    private $MinimumBestOfferPrice_AmountType;
    private $PayPerLeadEnabled;
    private $RelistedItemID;
    private $SecondChanceOriginalItemID;
    private $StartTime;
    private $TCROriginalItemID;
    private $ViewItemURL;
    private $ViewItemURLForNaturalSearch;
     
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Adult
        if(isset($this->Adult)){
            $xml .= '<Adult>'.$this->Adult.'</Adult>';
        }
        
        // BestOfferAutoAcceptPrice
        if(isset($this->BestOfferAutoAcceptPrice)){
            
            $xml .= '<BestOfferAutoAcceptPrice';
            
            if(isset($this->BestOfferAutoAcceptPrice_AmountType)){
                $xml .= ' currencyID="'.$this->BestOfferAutoAcceptPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->BestOfferAutoAcceptPrice.'</BestOfferAutoAcceptPrice>';
        }
        
        // BindingAuction
        if(isset($this->BindingAuction)){
            $xml .= '<BindingAuction>'.$this->BindingAuction.'</BindingAuction>';
        }
        
        // BuyItNowAvailable
        if(isset($this->BuyItNowAvailable)){
            $xml .= '<BuyItNowAvailable>'.$this->BuyItNowAvailable.'</BuyItNowAvailable>';
        }
        
        // CheckoutEnabled
        if(isset($this->CheckoutEnabled)){
            $xml .= '<CheckoutEnabled>'.$this->CheckoutEnabled.'</CheckoutEnabled>';
        }
        
        // ConvertedBuyItNowPrice
        if(isset($this->ConvertedBuyItNowPrice)){
            $xml .= '<ConvertedBuyItNowPrice';
            
            if(isset($this->ConvertedBuyItNowPrice_AmountType)){
                $xml .= ' currencyID="'.$this->ConvertedBuyItNowPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->ConvertedBuyItNowPrice.'</ConvertedBuyItNowPrice>';
        }
        
        // ConvertedReservePrice
        if(isset($this->ConvertedReservePrice)){
            $xml .= '<ConvertedReservePrice';
            
            if(isset($this->ConvertedReservePrice_AmountType)){
                $xml .= ' currencyID="'.$this->ConvertedReservePrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->ConvertedReservePrice.'</ConvertedReservePrice>';
        }
        
        // ConvertedStartPrice
        if(isset($this->ConvertedStartPrice)){
            $xml .= '<ConvertedStartPrice';
            
            if(isset($this->ConvertedStartPrice_AmountType)){
                $xml .= ' currencyID="'.$this->ConvertedStartPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->ConvertedStartPrice.'</ConvertedStartPrice>';
        }
        
        // EndTime
        if(isset($this->EndTime)){
            $xml .= '<EndTime>'.$this->EndTime.'</EndTime>';
        }
        
        // HasPublicMessages
        if(isset($this->HasPublicMessages)){
            $xml .= '<HasPublicMessages>'.$this->HasPublicMessages.'</HasPublicMessages>';
        }
        
        // HasReservePrice
        if(isset($this->HasReservePrice)){
            $xml .= '<HasReservePrice>'.$this->HasReservePrice.'</HasReservePrice>';
        }
        
        // HasUnansweredQuestions
        if(isset($this->HasUnansweredQuestions)){
            $xml .= '<HasUnansweredQuestions>'.$this->HasUnansweredQuestions.'</HasUnansweredQuestions>';
        }
        
        // LocalListingDistance
        if(isset($this->LocalListingDistance)){
            $xml .= '<LocalListingDistance>'.$this->LocalListingDistance.'</LocalListingDistance>';
        }
        
        // MinimumBestOfferMessage
        if(isset($this->MinimumBestOfferMessage)){
            $xml .= '<MinimumBestOfferMessage>'.$this->MinimumBestOfferMessage.'</MinimumBestOfferMessage>';
        }
        
        // MinimumBestOfferPrice
        if(isset($this->MinimumBestOfferPrice)){
            $xml .= '<MinimumBestOfferPrice';
            
            if(isset($this->MinimumBestOfferPrice_AmountType)){
                $xml .= ' currencyID="'.$this->MinimumBestOfferPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->MinimumBestOfferPrice.'</MinimumBestOfferPrice>';
        }
        
        // PayPerLeadEnabled
        if(isset($this->PayPerLeadEnabled)){
            $xml .= '<PayPerLeadEnabled>'.$this->PayPerLeadEnabled.'</PayPerLeadEnabled>';
        }
        
        // RelistedItemID
        if(isset($this->RelistedItemID)){
            $xml .= '<RelistedItemID>'.$this->RelistedItemID.'</RelistedItemID>';
        }
        
        // SecondChanceOriginalItemID
        if(isset($this->SecondChanceOriginalItemID)){
            $xml .= '<SecondChanceOriginalItemID>'.$this->SecondChanceOriginalItemID.'</SecondChanceOriginalItemID>';
        }
        
        // StartTime
        if(isset($this->StartTime)){
            $xml .= '<StartTime>'.$this->StartTime.'</StartTime>';
        }
        
        // TCROriginalItemID
        if(isset($this->TCROriginalItemID)){
            $xml .= '<TCROriginalItemID>'.$this->TCROriginalItemID.'</TCROriginalItemID>';
        }
        
        // ViewItemURL
        if(isset($this->ViewItemURL)){
            $xml .= '<ViewItemURL>'.$this->ViewItemURL.'</ViewItemURL>';
        }
        
        // ViewItemURLForNaturalSearch
        if(isset($this->ViewItemURLForNaturalSearch)){
            $xml .= '<ViewItemURLForNaturalSearch>'.$this->ViewItemURLForNaturalSearch.'</ViewItemURLForNaturalSearch>';
        }
        
        return $xml;
    }
    
    /**
     * Adult
     * @access public
     * @param boolean $Adult [1]
     */
    public function Adult($Adult){
        $this->Adult = $this->_get_boolean($Adult);
        return $this;
    }
    
    /**
     * BestOfferAutoAcceptPrice
     * @access public
     * @param double $BestOfferAutoAcceptPrice
     * @param CurrencyCodeType $AmountType See link
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html
     */
    public function BestOfferAutoAcceptPrice($BestOfferAutoAcceptPrice,$AmountType = ''){
        $this->BestOfferAutoAcceptPrice = $BestOfferAutoAcceptPrice;
        $this->BestOfferAutoAcceptPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * BindingAuction
     * @access public
     * @param boolean $BindingAuction [1]
     */
    public function BindingAuction($BindingAuction){
        $this->BindingAuction = $this->_get_boolean($BindingAuction);
        return $this;
    }
    
    /**
     * BuyItNowAvailable
     * @access public
     * @param boolean $BuyItNowAvailable [0..1]
     */
    public function BuyItNowAvailable($BuyItNowAvailable){
        $this->BuyItNowAvailable = $this->_get_boolean($BuyItNowAvailable);
        return $this;
    }
    
    /**
     * CheckoutEnabled
     * @access public
     * @param boolean $CheckoutEnabled [1]
     */
    public function CheckoutEnabled($CheckoutEnabled){
        $this->CheckoutEnabled = $this->_get_boolean($CheckoutEnabled);
        return $this;
    }
    
    /**
     * ConvertedBuyItNowPrice
     * @access public
     * @param double $ConvertedBuyItNowPrice
     * @param CurrencyCodeType $AmountType See link
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html 
     */
    public function ConvertedBuyItNowPrice ($ConvertedBuyItNowPrice,$AmountType = ''){
        $this->ConvertedBuyItNowPrice = $ConvertedBuyItNowPrice;
        $this->ConvertedBuyItNowPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * ConvertedReservePrice
     * @access public
     * @param double $ConvertedReservePrice
     * @param CurrencyCodeType $AmountType See link
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html 
     */
    public function ConvertedReservePrice($ConvertedReservePrice,$AmountType = ''){
        $this->ConvertedReservePrice = $ConvertedReservePrice;
        $this->ConvertedReservePrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * ConvertedStartPrice
     * @access public
     * @param double $ConvertedStartPrice
     * @param CurrencyCodeType $AmountType See link
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html 
     */
    public function ConvertedStartPrice($ConvertedStartPrice,$AmountType = ''){
        $this->ConvertedStartPrice = $ConvertedStartPrice;
        $this->ConvertedStartPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * EndTime
     * @access public
     * @param dateTime $EndTime 
     */
    public function EndTime($EndTime){
        $this->EndTime = $EndTime;
        return $this;
    }
    
    /**
     * HasPublicMessages
     * @access public
     * @param boolean $HasPublicMessages 
     */
    public function HasPublicMessages($HasPublicMessages){
        $this->HasPublicMessages = $this->_get_boolean($HasPublicMessages);
        return $this;
    }
    
    /**
     * HasReservePrice
     * @access public
     * @param boolean $HasReservePrice
     */
    public function HasReservePrice($HasReservePrice){
        $this->HasReservePrice = $this->_get_boolean($HasReservePrice);
        return $this;
    }
    
    /**
     * HasUnansweredQuestions
     * @access public
     * @param boolean $HasUnansweredQuestions 
     */
    public function HasUnansweredQuestions($HasUnansweredQuestions){
        $this->HasUnansweredQuestions = $this->_get_boolean($HasUnansweredQuestions);
        return $this;
    }
    
    /**
     * LocalListingDistance
     * @access public
     * @param string $LocalListingDistance 
     */
    public function LocalListingDistance($LocalListingDistance){
        $this->LocalListingDistance = $LocalListingDistance;
        return $this;
    }
    
    /**
     * MinimumBestOfferMessage
     * @access public
     * @param string $MinimumBestOfferMessage 
     */
    public function MinimumBestOfferMessage($MinimumBestOfferMessage){
        $this->MinimumBestOfferMessage = $MinimumBestOfferMessage;
        return $this;
    }
    
    /**
     * MinimumBestOfferPrice
     * @access public
     * @param double $MinimumBestOfferPrice
     * @param CurrencyCodeType $AmountType See link
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html 
     */
    public function MinimumBestOfferPrice($MinimumBestOfferPrice,$AmountType = ''){
        $this->MinimumBestOfferPrice = $MinimumBestOfferPrice;
        $this->MinimumBestOfferPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * PayPerLeadEnabled
     * @access public
     * @param boolean $PayPerLeadEnabled 
     */
    public function PayPerLeadEnabled($PayPerLeadEnabled){
        $this->PayPerLeadEnabled = $this->_get_boolean($PayPerLeadEnabled);
        return $this;
    }
    
    /**
     * RelistedItemID
     * @access public
     * @param string $RelistedItemID 
     */
    public function RelistedItemID($RelistedItemID){
        $this->RelistedItemID = $RelistedItemID;
        return $this;
    }
    
    /**
     * SecondChanceOriginalItemID
     * @access public
     * @param string $SecondChanceOriginalItemID 
     */
    public function SecondChanceOriginalItemID($SecondChanceOriginalItemID){
        $this->SecondChanceOriginalItemID = $SecondChanceOriginalItemID;
        return $this;
    }
    
    /**
     * StartTime
     * @access public
     * @param dateTime $StartTime 
     */
    public function StartTime($StartTime){
        $this->StartTime = $StartTime;
        return $this;
    }
    
    /**
     * TCROriginalItemID
     * @access public
     * @param string $TCROriginalItemID 
     */
    public function TCROriginalItemID($TCROriginalItemID){
        $this->TCROriginalItemID = $TCROriginalItemID;
        return $this;
    }
    
    /**
     * ViewItemURL
     * @access public
     * @param string $ViewItemURL 
     */
    public function ViewItemURL($ViewItemURL){
        $this->ViewItemURL = $ViewItemURL;
        return $this;
    }
    
    /**
     * ViewItemURLForNaturalSearch
     * @access public
     * @param string $ViewItemURLForNaturalSearch 
     */
    public function ViewItemURLForNaturalSearch($ViewItemURLForNaturalSearch){
        $this->ViewItemURLForNaturalSearch = $ViewItemURLForNaturalSearch;
        return $this;
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
}