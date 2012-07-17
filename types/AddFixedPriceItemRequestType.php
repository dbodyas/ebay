<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AddFixedPriceItemRequestType
 */
class AddFixedPriceItemRequestType {
    
    // Types
    private $Item; // ItemType
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Item
        if(isset($this->Item)){
            $xml .= '<Item>'.$this->Item->build().'</Item>';
        }
        
        return $xml;
    }
    
    /**
     * Item
     * @access public
     * @param ItemType $ItemType
     */
    public function Item($ItemType){
        $this->Item = $ItemType;
        return $thus;
    }
}
