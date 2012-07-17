<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AddItemFromSellingManagerTemplateRequestType
 */
class AddItemFromSellingManagerTemplateRequestType {
    
    // Fields
    private $SaleTemplateID;
    private $ScheduleTime;
    
    // Types
    private $Item; // ItemType
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Item
        if(isset($this->Item)){
            $xml .= '<Item>';
            $xml .= $this->Item->build();
            $xml .= '</Item>';
        }
        
        // SaleTemplateID
        if(isset($this->SaleTemplateID)){
            $xml .= '<SaleTemplateID>'.$this->SaleTemplateID.'</SaleTemplateID>';
        }
        
        // ScheduleTime
        if(isset($this->ScheduleTime)){
            $xml .= '<ScheduleTime>'.$this->ScheduleTime.'</ScheduleTime>';
        }
        
        return $xml;
    }
    
    /**
     * Item
     * @access public
     * @param ItemType $ItemType 
     */
    public function Item($ItemType){
        $this->Item = $ItemType;
        return $this;
    }
    
    /**
     * SaleTemplateID
     * @access public
     * @param long $SaleTemplateID 
     */
    public function SaleTemplateID($SaleTemplateID){
        $this->SaleTemplateID = $SaleTemplateID;
        return $this;
    }
    
    /**
     * ScheduleTime
     * @access public
     * @param dateTime $ScheduleTime 
     */
    public function ScheduleTime($ScheduleTime){
        $this->ScheduleTime = $ScheduleTime;
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
