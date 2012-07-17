<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package CharacteristicType
 */
class CharacteristicType {
    
    // Fields
    private $AttributeID;
    private $DateFormat;
    private $DisplaySequence;
    private $DisplayUOM;
    private $SortOrder;

    // Types
    private $Label; // LabelType
    private $ValueList; // ValType
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // AttributeID
        if(isset($this->AttributeID)){
            $xml .= '<AttributeID>'.$this->AttributeID.'</AttributeID>';
        }
        
        // DateFormat
        if(isset($this->DateFormat)){
            $xml .= '<DateFormat>'.$this->DateFormat.'</DateFormat>';
        }
        
        // DisplaySequence
        if(isset($this->DisplaySequence)){
            $xml .= '<DisplaySequence>'.$this->DisplaySequence.'</DisplaySequence>';
        }
        
        // DisplayUOM
        if(isset($this->DisplayUOM)){
            $xml .= '<DisplayUOM>'.$this->DisplayUOM.'</DisplayUOM>';
        }
        
        // Label
        if(isset($this->Label)){
            $xml .= '<Label';
            
            if($this->Label->get_visible() !== ''){
                $xml .= ' visible="'.$this->Label->get_visible().'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->Label->build();
            $xml .= '</Label>';
        }
        
        // SortOrder
        if(isset($this->SortOrder)){
            $xml .= '<SortOrder>'.$this->SortOrder.'</SortOrder>';
        }
        
        // ValueList
        if(isset($this->ValueList)){
            $xml .= '<ValueList>'.$this->ValueList.'</ValueList>';
        }
        
        return $xml;
    }
    
    /**
     * AttributeID
     * @access public
     * @param int $AttributeID 
     */
    public function AttributeID($AttributeID){
        $this->AttributeID = $AttributeID;
        return $this;
    }
    
    /**
     * DateFormat
     * @access public
     * @param string $DateFormat 
     */
    public function DateFormat($DateFormat){
        $this->DateFormat = $DateFormat;
        return $this;
    }
    
    /**
     * DisplaySequence
     * @access public
     * @param string $DisplaySequence 
     */
    public function DisplaySequence($DisplaySequence){
        $this->DisplaySequence = $DisplaySequence;
        return $this;
    }
    
    /**
     * DisplayUOM
     * @access public
     * @param string $DisplayUOM 
     */
    public function DisplayUOM($DisplayUOM){
        $this->DisplayUOM = $DisplayUOM;
        return $this;
    }
    
    /**
     * Label
     * @access public
     * @param LabelType $LabelType 
     */
    public function Label($LabelType){
        $this->Label = $LabelType;
        return $this;
    }
    
    /**
     * SortOrder
     * @access public
     * @param SortOrderCodeType $SortOrder
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SortOrderCodeType.html
     */
    public function SortOrder($SortOrder){
        $this->SortOrder = $SortOrder;
        return $this;
    }
    
    /**
     * ValueList
     * @access public
     * @param ValType[] $ValType 
     */
    public function ValueList($ValType){
        if(is_array($ValType)){
            $this->ValueList = $ValType;
        } else {
            $this->ValueList = array($ValType);
        }
        return $this;
    }
    
    
}
