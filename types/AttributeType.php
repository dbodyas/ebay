<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AttributeType
 */
class AttributeType {
    
    // Fields
    private $attributeID;
    private $attributeLabel;
    
    // Types
    private $Value; // ValType
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){

        $xml = FALSE;
        // Value
        if(isset($this->Value)){
            
            foreach($this->Value as $value){      
                $xml .= '<Value>';
                $xml .= $value->build();
                $xml .= '<Value>';
            }            
        }
        return $xml;
    }
    
    /**
     * Value
     * @access public
     * @param array[] $ValType [0..*]
     */
    public function Value($ValType){
        if(is_array($ValType)){
            $this->Value = $ValType;
        } else {
            $this->Value = array($ValType);
        }        
        return $this;
    }
    
    /**
     * attributeID
     * @access public
     * @param int $attributeID 
     */
    public function attributeID($attributeID){
        $this->attributeID = $attributeID;
        return $this;
    }
    
    /**
     * attributeLabel
     * @access public
     * @param string $attributeLabel 
     */
    public function attributeLabel($attributeLabel){
        $this->attributeLabel = $attributeLabel;
        return $this;
    }
    
    public function get_attributeID(){
        if(isset($this->attributeID)){
            return $this->attributeID;
        } else {
            return FALSE;
        }
    }
    
    public function get_attributeLabel(){
        if(isset($this->attributeLabel)){
            return $this->attributeLabel;
        } else {
            return FALSE;
        }
    }
    
}

?>
