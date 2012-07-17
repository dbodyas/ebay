<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AddDisputeResponseRequestType
 */
class AddDisputeResponseRequestType {
    
    // Fields
    private $DisputeActivity;
    private $DisputeID;
    private $MessageText;
    private $ShipmentTrackNumber;
    private $ShippingCarrierUsed;
    private $ShippingTime;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // DisputeActivity
        if(isset($this->DisputeActivity)){
            $xml .= '<DisputeActivity>'.$this->DisputeActivity.'</DisputeActivity>';
        }
        
        // DisputeID
        if(isset($this->DisputeID)){
            $xml .= '<DisputeID>'.$this->DisputeID.'</DisputeID>';
        }
        
        // MessageText
        if(isset($this->MessageText)){
            $xml .= '<MessageText>'.$this->MessageText.'</MessageText>';
        }
        
        // ShipmentTrackNumber
        if(isset($this->ShipmentTrackNumber)){
            $xml .= '<ShipmentTrackNumber>'.$this->ShipmentTrackNumber.'</ShipmentTrackNumber>';
        }
        
        // ShippingCarrierUsed
        if(isset($this->ShippingCarrierUsed)){
            $xml .= '<ShippingCarrierUsed>'.$this->ShippingCarrierUsed.'</ShippingCarrierUsed>';
        }
        
        // ShippingTime
        if(isset($this->ShippingTime)){
            $xml .= '<ShippingTime>'.$this->ShippingTime.'</ShippingTime>';
        }
        
        return $xml;
    }
    
    /**
     * DisputeActivity
     * @access public
     * @param DisputeActivityCodeType $DisputeActivity
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeActivityCodeType.html
     */
    public function DisputeActivity($DisputeActivityCodeType){
        $this->DisputeActivity = $DisputeActivityCodeType;
        return $this;
    }
    
    /**
     * DisputeID
     * @access public
     * @param string $DisputeID 
     */
    public function DisputeID($DisputeID){
        $this->DisputeID = $DisputeID;
        return $this;
    }
    
    /**
     * MessageText
     * @access public
     * @param string $MessageText 
     */
    public function MessageText($MessageText){
        $this->MessageText = $MessageText;
        return $this;
    }
    
    /**
     * ShipmentTrackNumber
     * @access public
     * @param string $ShipmentTrackNumber 
     */
    public function ShipmentTrackNumber($ShipmentTrackNumber){
        $this->ShipmentTrackNumber = $ShipmentTrackNumber;
        return $this;
    }
    
    /**
     * ShippingCarrierUsed
     * @access public
     * @param string $ShippingCarrierUsed 
     */
    public function ShippingCarrierUsed($ShippingCarrierUsed){
        $this->ShippingCarrierUsed = $ShippingCarrierUsed;
        return $this;
    }
    
    /**
     * ShippingTime
     * @access public
     * @param dateTime $ShippingTime 
     */
    public function ShippingTime($ShippingTime){
        $this->ShippingTime = $ShippingTime;
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
