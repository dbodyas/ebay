<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AttributeArrayType
 */
class AttributeArrayType {
   
    // Types
    private $Attribute; // ValType
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Attribute
        if(isset($this->Attribute)){
            foreach($this->Attribute as $attribute){       
                
                // Tag with attributes
                $xml .= '<Attribute';
                
                if($attribute->get_attributeID() !== FALSE){
                    $xml .= ' attributeID="'.$attribute->get_attributeID().'"';
                }
                
                if($attribute->get_attributeLabel() !== FALSE){
                    $xml .= ' attributeLabel="'.$attribute->get_attributeLabel().'"';
                }       
                
                $xml .= '>';
                
                
                $xml .= $attribute->build();
                $xml .= '<Attribute>';
            }            
        }        
        return $xml;
    }
    
    /**
     * Attribute
     * @access public
     * @param array[] $AttributeType [1..*] 
     */
    public function Attribute($AttributeType){
        if(is_array($AttributeType)){
            $this->Attribute = $AttributeType;
        } else {
            $this->Attribute = array($AttributeType);
        }
        return $this;
        
    }
    
}

?>
