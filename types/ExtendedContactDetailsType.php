<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ExtendedContactDetailsType
 */
class ExtendedContactDetailsType {
    
    // Fields
    private $ClassifiedAdContactByEmailEnabled;
    private $PayPerLeadPhoneNumber;
    
    // Types
    private $ContactHoursDetails; // ContactHoursDetailsType
    
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // ClassifiedAdContactByEmailEnabled
        if(isset($this->ClassifiedAdContactByEmailEnabled)){
            $xml .= '<ClassifiedAdContactByEmailEnabled>'.$this->ClassifiedAdContactByEmailEnabled.'</ClassifiedAdContactByEmailEnabled>';
        }
        
        // ContactHoursDetails
        if(isset($this->ContactHoursDetails)){
            $xml .= '<ContactHoursDetails>';
            $xml .= $this->ContactHoursDetails->build();
            $xml .= '</ContactHoursDetails>';
        }
        
        // PayPerLeadPhoneNumber
        if(isset($this->PayPerLeadPhoneNumber)){
            $xml .= '<PayPerLeadPhoneNumber>'.$this->PayPerLeadPhoneNumber.'</PayPerLeadPhoneNumber>';
        }
       
        return $xml;
    }
    
    /**
     * ClassifiedAdContactByEmailEnabled
     * @access public
     * @param boolean $ClassifiedAdContactByEmailEnabled 
     */
    public function ClassifiedAdContactByEmailEnabled($ClassifiedAdContactByEmailEnabled){
        $this->ClassifiedAdContactByEmailEnabled = $this->_get_boolean($ClassifiedAdContactByEmailEnabled);
        return $this;
    }
    
    /**
     * ContactHoursDetails
     * @access public
     * @param ContactHoursDetails $ContactHoursDetailsType [0..1]
     */
    public function ContactHoursDetails($ContactHoursDetailsType){
        $this->ContactHoursDetails = $ContactHoursDetailsType;
        return $this;
    }
    
    /**
     * PayPerLeadPhoneNumber
     * @access public
     * @param string $PayPerLeadPhoneNumber [0..1]
     */
    public function PayPerLeadPhoneNumber($PayPerLeadPhoneNumber){
        $this->PayPerLeadPhoneNumber = $PayPerLeadPhoneNumber;
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