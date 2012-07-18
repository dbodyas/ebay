<?php

namespace rearley\Ebay\Calls;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AddFixedPriceItem
 */
class AddFixedPriceItem extends \rearley\Ebay\Calls\TradingCallReference {
    
    // Types
    private $Item; // ItemType

    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        // Opening tag(s)        
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= '<AddFixedPriceItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        
        // Standard Calls
        $xml .= $this->build_standard_call();
        
       // Item
        if(isset($this->Item)){
            $xml .= '<Item>';
            $xml .= $this->Item->build();
            $xml .= '<Item>';
        }
        
        // Closing tag(s)
        $xml .= '</AddFixedPriceItemRequest>';
        
        return $xml;
    }
    
    /**
     * Item
     * @access public
     * @param ItemType $ItemType 
     */
    public function Item($ItemType){
        $this->Item = $ItemType;
        return $this;
    }
}