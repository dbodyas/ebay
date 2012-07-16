<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ContactHoursDetailsType
 */
class ContactHoursDetailsType {
    
    // Fields
   private $Hours1AnyTime;
   private $Hours1Days;
   private $Hours1From;
   private $Hours1To;
   private $Hours2AnyTime;
   private $Hours2Days;
   private $Hours2From;
   private $Hours2To;
   private $TimeZoneID;
   
   
   
   
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Hours1AnyTime 
        if(isset($this->Hours1AnyTime)){
            $xml .= '<Hours1AnyTime>'.$this->Hours1AnyTime.'</Hours1AnyTime>';
        }
        
        // Hours1Days
        if(isset($this->Hours1Days)){
            $xml .= '<Hours1Days>'.$this->Hours1Days.'</Hours1Days>';
        }
        
        // Hours1From
        if(isset($this->Hours1From)){
            $xml .= '<Hours1From>'.$this->Hours1From.'</Hours1From>';
        }
        
        // Hours1To
        if(isset($this->Hours1To)){
            $xml .= '<Hours1To>'.$this->Hours1To.'</Hours1To>';
        }
        
        // Hours2AnyTime 
        if(isset($this->Hours2AnyTime)){
            $xml .= '<Hours2AnyTime>'.$this->Hours2AnyTime.'</Hours2AnyTime>';
        }
        
        // Hours2Days
        if(isset($this->Hours2Days)){
            $xml .= '<Hours2Days>'.$this->Hours2Days.'</Hours2Days>';
        }
        
        // Hours2From
        if(isset($this->Hours2From)){
            $xml .= '<Hours2From>'.$this->Hours2From.'</Hours2From>';
        }
        
        // Hours2To
        if(isset($this->Hours2To)){
            $xml .= '<Hours2To>'.$this->Hours2To.'</Hours2To>';
        }
        
        // TimeZoneID
        if(isset($this->TimeZoneID)){
            $xml .= '<TimeZoneID>'.$this->TimeZoneID.'</TimeZoneID>';
        }
                
        return $xml;
    }
    
    /**
     * Hours1AnyTime
     * @access public
     * @param boolean $Hours1AnyTime [0..1]
     */
    public function Hours1AnyTime($Hours1AnyTime){
        $this->Hours1AnyTime = $this->_get_boolean($Hours1AnyTime);
        return $this;
    }
    
    /**
     * Hours1Days
     * @access public
     * @param DaysCodeType $Hours1Days [0..1]
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DaysCodeType.html
     */
    public function Hours1Days($Hours1Days){
        $this->Hours1Days = $Hours1Days;
        return $this;
    }
    
    /**
     * Hours1From
     * @access public
     * @param time $Hours1From 
     */
    public function Hours1From($Hours1From){
        $this->Hours1From = $Hours1From;
        return $this;
    }
    
    /**
     * Hours1To
     * @access public
     * @param time $Hours1To 
     */
    public function Hours1To($Hours1To){
        $this->Hours1To = $Hours1To;
        return $this;
    }
    
    /**
     * Hours2AnyTime
     * @access public
     * @param boolean $Hours2AnyTime [0..1]
     */
    public function Hours2AnyTime($Hours2AnyTime){
        $this->Hours2AnyTime = $this->_get_boolean($Hours2AnyTime);
        return $this;
    }
    
    /**
     * Hours2Days
     * @access public
     * @param DaysCodeType $Hours2Days [0..1]
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DaysCodeType.html
     */
    public function Hours2Days($Hours2Days){
        $this->Hours2Days = $Hours2Days;
        return $this;
    }
    
    /**
     * Hours2From
     * @access public
     * @param time $Hours2From 
     */
    public function Hours2From($Hours2From){
        $this->Hours2From = $Hours2From;
        return $this;
    }
    
    /**
     * Hours2To
     * @access public
     * @param time $Hours2To 
     */
    public function Hours2To($Hours2To){
        $this->Hours2To = $Hours2To;
        return $this;
    }
    
    /**
     * TimeZoneID
     * @access public
     * @param string $TimeZoneID 
     */
    public function TimeZoneID($TimeZoneID){
        $this->TimeZoneID = $TimeZoneID;
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