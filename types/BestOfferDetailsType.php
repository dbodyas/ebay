<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package BestOfferDetailsType
 */
class BestOfferDetailsType {
    
    // Fields
    private $BestOffer;
    private $AmmountType;
    private $BestOfferCount;
    private $BestOfferEnabled;
    private $BestOfferStatus;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // BestOffer
        if(isset($this->BestOffer)){
            $xml .= '<BestOffer>'.$this->BestOffer.'</BestOffer>';
        }
        
        // BestOfferCount
        if(isset($BestOfferCount)){
            $xml .= '<BestOfferCount>'.$this->BestOfferCount.'</BestOfferCount>';
        }
        
        // BestOfferEnabled
        if(isset($this->BestOfferEnabled)){
            $xml .= '<BestOfferEnabled>'.$this->BestOfferEnabled.'</BestOfferEnabled>';
        }
        
        // BestOfferStatus
        if(isset($this->BestOfferStatus)){
            $xml .= '<BestOfferStatus>'.$this->BestOfferStatus.'</BestOfferStatus>';
        }
        
        return $xml;
    }
    
    /**
     * BestOffer
     * @access public
     * @param double $BestOffer
     * @param string $AmountType 
     */
    public function BestOffer($BestOffer,$AmountType = NULL){
        $this->BestOffer = $BestOffer;
        $this->AmmountType = $AmountType;
        return $this;
    }
    
    /**
     * BestOfferCount 
     * @access public
     * @param int $BestOfferCount 
     */
    public function BestOfferCount($BestOfferCount){
        $this->BestOfferCount = $BestOfferCount;
    }
    
    /**
     * BestOfferEnabled
     * @access public
     * @param boolean $BestOfferEnabled 
     */
    public function BestOfferEnabled($BestOfferEnabled){
        $this->BestOfferEnabled = $this->_get_boolean($BestOfferEnabled);
    }
    
    /**
     * BestOfferStatus
     * @access public
     * @param string $BestOfferStatus Check Link for Values
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BestOfferStatusCodeType.html
     */
    public function BestOfferStatus($BestOfferStatus){
        $this->BestOfferStatus = $BestOfferStatus;
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

?>
