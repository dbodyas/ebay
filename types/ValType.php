<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ValType
 */
class ValType {
    
    // Fields
    private $ValueID;
    private $ValueLiteral;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // ValueID
        if(isset($this->ValueID)){
            $xml .= '<ValueID>'.$this->ValueID.'</ValueID>';
        }
        
        // ValueLiteral
        if(isset($this->ValueLiteral)){
            $xml .= '<ValueLiteral>'.$this->ValueLiteral.'</ValueLiteral>';
        }
        
        return $xml;
    }
    
    /**
     * ValueID
     * @access public
     * @param int $valueid [0..1] 
     */
    public function ValueID($valueid){
        $this->ValueID = $valueid;
        return $this;
    }
    
    /**
     * ValueLiteral
     * @access public
     * @param string $ValueLiteral [0..1] 
     */
    public function ValueLiteral($ValueLiteral){
        $this->ValueLiteral = $ValueLiteral;
        return $this;
    }
    
}

?>
