<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package LabelType
 */
class LabelType {
    
    // Fields
    private $Name;
    
    // Attribute
    private $visible;
    
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
     * visible (attribute)
     * @param type $visible 
     */
    public function visible($visible){
        $this->visible = $visible;
        return $this;
    }
    
    /**
     * Visible Attribute
     * @return boolean
     */
    public function get_visible(){
        return $this->visible;
    }
}
