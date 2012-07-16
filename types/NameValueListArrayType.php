<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package NameValueListArrayType
 */
class NameValueListArrayType {
   
    // Types
    private $NameValueList ; //  NameValueListType 
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Attribute
        if(isset($this->NameValueList)){
            foreach($this->NameValueList as $nvl){       
                
                // Tag with attributes
                $xml .= '<NameValueList>';
                $xml .= $nvl->build();
                $xml .= '<NameValueList>';
            }            
        }        
        return $xml;
    }
    
    /**
     * NameValueList
     * @access public
     * @param array[] $NameValueList [0..*] 
     */
    public function NameValueList($NameValueListType){
        if(is_array($NameValueListType)){
            $this->NameValueList = $NameValueListType;
        } else {
            $this->NameValueList = array($NameValueListType);
        }
        return $this;
        
    }
    
}

?>
