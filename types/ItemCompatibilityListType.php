<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ItemCompatibilityListType
 */
class ItemCompatibilityListType {

    // Fields
    private $ReplaceAll;
    
    // Types
    private $Compatibility; // NameValueListType
    
    function __construct() {
               
    }
    
    /**
     * Builds the XML
     * @access public
     */
    public function build(){
        
        $xml = FALSE;
        
        // Compatibility
        if(isset($this->Compatibility)){
            
            foreach($this->Compatibility as $c){
                
                $xml .= '<Compatibility>';
                
                $xml .= $c->build();
                
                $xml .= '</Compatibility>';
            }
        }
        
        // ReplaceAll
        if(isset($this->ReplaceAll)){
            
            $xml .= '<ReplaceAll>'.$this->ReplaceAll.'</ReplaceAll>';
        }
        
        return $xml;
    }

    /**
     * ReplaceAll
     * @access public
     * @param boolean $boolean Set this value to true to delete or replace all existing parts compatibility information when you revise or relist an item
     */
    public function ReplaceAll($boolean){
        $this->ReplaceAll = $this->_get_boolean($boolean);
        return $this;
    }
    
    /**
     * Compatibility
     * @access public
     * @param array[] $array Array of ItemCompatibilityType(s).
     */
    public function Compatibility($array){
        
        if(is_array($array)){
            $this->Compatibility = $array;
        }
        
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