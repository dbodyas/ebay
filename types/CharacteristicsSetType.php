<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package CharacteristicsSetType
 */
class CharacteristicsSetType {
    
    // Fields
    private $AttributeSetID;
    private $AttributeSetVersion;
    private $Name;
    
    // Types
    private $Characteristics; //  CharacteristicType
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // AttributeSetID
        if(isset($this->AttributeSetID)){
            $xml .= '<AttributeSetID>'.$this->AttributeSetID.'</AttributeSetID>';
        }
        
        // AttributeSetVersion
        if(isset($this->AttributeSetVersion)){
            $xml .= '<AttributeSetVersion>'.$this->AttributeSetVersion.'</AttributeSetVersion>';
        }
        
        // Characteristics
        if(isset($this->Characteristics)){
            foreach($this->Characteristics as $c){
                $xml .= '<Characteristics>';
                $xml .= $c->build();
                $xml .= '</Characteristics>';
            }
        }
        
        // Name
        if(isset($this->Name)){
            $xml .= '<Name>'.$this->Name.'</Name>';
        }
        
        return $xml;
    }
    
    /**
     * AttributeSetID
     * @access public
     * @param int $AttributeSetID 
     */
    public function AttributeSetID($AttributeSetID){
        $this->AttributeSetID = $AttributeSetID;
        return $this;
    }
    
    /**
     * AttributeSetVersion
     * @access public
     * @param string $AttributeSetVersion 
     */
    public function AttributeSetVersion($AttributeSetVersion){
        $this->AttributeSetVersion = $AttributeSetVersion;
        return $this;
    }
    
    /**
     * Characteristics
     * @access public
     * @param CharacteristicType[] $CharacteristicType 
     */
    public function Characteristics($CharacteristicType ){
        if(is_array($CharacteristicType)){
            $this->Characteristics = $CharacteristicType;
        } else {
            $this->Characteristics = array($CharacteristicType);
        }
        return $this;
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
