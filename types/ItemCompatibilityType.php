<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ItemCompatibilityType
 */
class ItemCompatibilityType {

    // Fields
    private $CompatibilityNotes;
    private $Delete;
    
    // Types
    private $NameValueList; // NameValueListType
    
    function __construct() {
               
    }
    
    /**
     * Builds XML
     * @access public
     * @return string 
     */
    function build(){
        
        $xml = FALSE;
        
        // CompatibilityNotes
        if(isset($this->CompatibilityNotes)){
            $xml .= '<CompatibilityNotes>'.$this->CompatibilityNotes.'</CompatibilityNotes>';
        }
        
        // Delete
        if(isset($this->Delete)){
            $xml .= '<Delete>'.$this->Delete.'</Delete>';
        }
        
        // NameValueList
        if(isset($this->NameValueList)){
            foreach($this->NameValueList as $nvl){
                
                // Open
                $xml .= '<NameValueList>';
                
                // List
                $xml .= $nvl->build();
                
                // Close
                $xml .= '</NameValueList>';
            }
        }
        
        return $xml;
        
    }
    
    /**
     * CompatibilityNotes
     * @access public
     * @param string $string The seller may optionally enter any notes pertaining to the compatibility being specified
     */
    public function CompatibilityNotes($string){
        $this->CompatibilityNotes = $string;
        return $this;
    }
    
    /**
     * Delete
     * @access public
     * @param boolean $boolean Removes individual parts compatibility nodes from the compatibility list.
     */
    public function Delete($boolean){
        $this->Delete = $this->_get_boolean($boolean);
        return $this;
    }
    
    /**
     * NameValueList
     * @access public
     * @param array[] $array Array of NameValueListType objects.
     */
    public function NameValueList($array){
        
        if(is_array($array)){
            $this->NameValueList = $array;
        } else {
            $this->NameValueList = array($array);
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