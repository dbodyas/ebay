<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package LookupAttributeType
 */
class LookupAttributeType {
    
    // Fields
    private $Name;
    private $Value;

    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){

        $xml = FALSE;
        
        // Name
        if(isset($this->Name)){
            $xml .= '<Name>'.$this->Name.'</Name>';
        }
        
        // Value
        if(isset($this->Value)){
            $xml .= '<Value>'.$this->Value.'</Value>';
        }
        
        return $xml;
    }
    
    /**
     * Name
     * @access public
     * @param string $Name 
     */
    public function Name($Name){
        $this->Name = $Name;
        return $this;
    }
    
    /**
     * Value
     * @access public
     * @param string $Value 
     */
    public function Value($Value){
        $this->Value = $Value;
        return $this;
    }
  
    
}