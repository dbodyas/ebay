<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package BuyerProtectionDetailsType
 */
class BuyerProtectionDetailsType {
    
    // Fields
    private $BuyerProtectionSource;
    private $BuyerProtectionStatus;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // BuyerProtectionSource
        if(isset($this->BuyerProtectionSource)){
            
            $xml .= '<BuyerProtectionSource>'.$this->BuyerProtectionSource.'</BuyerProtectionSource>';
        }
        
        // BuyerProtectionStatus
        if(isset($this->BuyerProtectionStatus)){
            
            $xml .= '<BuyerProtectionStatus>'.$this->BuyerProtectionStatus.'</BuyerProtectionStatus>';
        }
        
        return $xml;
    }
    
    /**
     * BuyerProtectionSource
     * @access public
     * @param string $sting Check link for values
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BuyerProtectionSourceCodeType.html
     */
    public function BuyerProtectionSource($string){
        $this->BuyerProtectionSource = $string;
        return $this;
    }
    
    /**
     * BuyerProtectionStatus 
     * @access public
     * @param string $string Check link for values
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BuyerProtectionCodeType.html
     */
    public function BuyerProtectionStatus($string){
        $this->BuyerProtectionStatus = $string;
        return $this;
    }
    
}

?>
