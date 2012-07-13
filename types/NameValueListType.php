<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package NameValueListType
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/NameValueListType.html
 */
class NameValueListType {

    // Fields
    private $Name;
    private $Source;
    private $Value;

    function __construct() {
        
    }
    
    /**
     * Builds the XML output
     * @access public
     * @return string 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Name
        if(isset($this->Name)){
            $xml .= '<Name>'.$this->Name.'</Name>';
        }
        
        // Source
        if(isset($this->Source)){
            $xml .= '<Source>'.$this->Source.'</Source>';
        }        
        
        // Value
        if(isset($this->Value)){
            foreach($this->Value as $value){
                $xml .= '<Value>'.$value.'</Value>';
            }
        }      
        
        return $xml;        
        
    }
    
    /**
     * Name
     * @access public
     * @param string $string A name in a name/value pair
     */
    public function Name($string) {
        $this->Name = $string;
        return $this;
    }

    /**
     * Source
     * @access public
     * @param string $string The origin of this Item Specific. Type ItemSpecificSourceCodeType allowed, see link.
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ItemSpecificSourceCodeType.html
     */
    public function Source($string) {
        $this->Source = $string;
        return $this;
    }

    /**
     * Value
     * @access public
     * @param array[] $array Value(s) associated with the name.
     */
    public function Value($array) {
        
        if(is_array($array)){
            $this->Value = $array;
        }
        return $this;
    }

}