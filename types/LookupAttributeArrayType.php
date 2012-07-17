<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package LookupAttributeArrayType
 */
class LookupAttributeArrayType {
    
    // Types
    private $LookupAttribute;

    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){

        $xml = FALSE;
        
        // LookupAttribute
        if(isset($this->LookupAttribute)){
            
            foreach($this->LookupAttribute as $la){
                $xml .= '<LookupAttribute>';
                $xml .= $la->build();
                $xml .= '</LookupAttribute>';
            }
        }
        
        return $xml;
    }
    
    /**
     * LookupAttribute
     * @access public
     * @param  LookupAttributeType[] $LookupAttributeType 
     */
    public function LookupAttribute($LookupAttributeType){
        if(is_array($LookupAttributeType)){
            $this->LookupAttribute = $LookupAttributeType;
        } else {
            $this->LookupAttribute = array($LookupAttributeType);
        }        
        return $this;
    }
    
}