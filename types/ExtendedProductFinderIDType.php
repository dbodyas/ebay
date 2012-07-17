<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ExtendedProductFinderIDType
 */
class ExtendedProductFinderIDType {
    
    // Fields
    private $ProductFinderBuySide;
    private $ProductFinderID;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // ProductFinderBuySide
        if(isset($this->ProductFinderBuySide)){
            $xml .= '<ProductFinderBuySide>'.$this->ProductFinderBuySide.'</ProductFinderBuySide>';
        }
        
        // ProductFinderID
        if(isset($this->ProductFinderID)){
            $xml .= '<ProductFinderID>'.$this->ProductFinderID.'</ProductFinderID>';
        }
        
        
        return $xml;
    }
    
    /**
     * ProductFinderBuySide
     * @access public
     * @param boolean $ProductFinderBuySide 
     */
    public function ProductFinderBuySide($ProductFinderBuySide){
        $this->ProductFinderBuySide = $this->_get_boolean($ProductFinderBuySide);
        return $this;
    }
    
    /**
     * ProductFinderID
     * @access public
     * @param int $ProductFinderID 
     */
    public function ProductFinderID($ProductFinderID){
        $this->ProductFinderID = $ProductFinderID;
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
