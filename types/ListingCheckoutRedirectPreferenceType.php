<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ListingCheckoutRedirectPreferenceType
 */
class ListingCheckoutRedirectPreferenceType {
    
    // Fields
    private $ProStoresStoreName;
    private $SellerThirdPartyUsername;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // ProStoresStoreName
        if(isset($this->ProStoresStoreName)){
            $xml .= '<ProStoresStoreName>'.$this->ProStoresStoreName.'</ProStoresStoreName';
        }
        
        // SellerThirdPartyUsername
        if(isset($this->SellerThirdPartyUsername)){
            $xml .= '<SellerThirdPartyUsername>'.$this->SellerThirdPartyUsername.'</SellerThirdPartyUsername>';
        }
        
        return $xml;
    }
    
    /**
     * ProStoresStoreName
     * @access public
     * @param string $ProStoresStoreName [0..1] 
     */
    public function ProStoresStoreName($ProStoresStoreName){
        $this->ProStoresStoreName = $ProStoresStoreName;
        return $this;
    }
    
    /**
     * SellerThirdPartyUsername
     * @access public
     * @param string $SellerThirdPartyUsername [0..1] 
     */
    public function SellerThirdPartyUsername($SellerThirdPartyUsername){
        $this->SellerThirdPartyUsername = $SellerThirdPartyUsername;
        return $this;
    }
    
}

?>
