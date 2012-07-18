<?php

namespace rearley\Ebay\Calls;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AddDispute
 */
class AddDispute extends \rearley\Ebay\Calls\TradingCallReference {
    
    // Fields
    private $DisputeExplanation;
    private $DisputeReason;
    private $ItemID;
    private $OrderLineItemID;
    private $TransactionID;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        // Opening tag(s)        
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= '<AddDisputeRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        
        // Standard Calls
        $xml .= $this->build_standard_call();
        
        // DisputeExplanation
        if(isset($this->DisputeExplanation)){
            $xml .= '<DisputeExplanation>'.$this->DisputeExplanation.'</DisputeExplanation>';
        }
        
        // DisputeReason
        if(isset($this->DisputeReason)){
            $xml .= '<DisputeReason>'.$this->DisputeReason.'</DisputeReason>';
        }
        
        // ItemID
        if(isset($this->ItemID)){
            $xml .= '<ItemID>'.$this->ItemID.'</ItemID>';
        }
        
        // OrderLineItemID
        if(isset($this->OrderLineItemID)){
            $xml .= '<OrderLineItemID>'.$this->OrderLineItemID.'</OrderLineItemID>';
        }
        
        // TransactionID
        if(isset($this->TransactionID)){
            $xml .= '<TransactionID>'.$this->TransactionID.'</TransactionID>';
        }
        
        // Closing tag(s)
        $xml .= '</AddDisputeRequest>';
        
        return $xml;
    }
    
    /**
     * DisputeExplanation
     * @access public
     * @param DisputeExplanationCodeType $DisputeExplanationCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/ebay/types/DisputeExplanationCodeType.html
     */
    public function DisputeExplanation($DisputeExplanationCodeType){
        $this->DisputeExplanation = $DisputeExplanationCodeType;
        return $this;
    }
    
    /**
     * DisputeReason
     * @access public
     * @param DisputeReasonCodeType $DisputeReasonCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/ebay/types/DisputeReasonCodeType.html
     */
    public function DisputeReason($DisputeReasonCodeType){
        $this->DisputeReason = $DisputeReasonCodeType;
        return $this;
    }
    
    /**
     * ItemID
     * @access public
     * @param string $ItemID 
     */
    public function ItemID($ItemID){
        $this->ItemID = $ItemID;
        return $this;
    }
    
    /**
     * OrderLineItemID
     * @access public
     * @param string $OrderLineItemID 
     */
    public function OrderLineItemID($OrderLineItemID){
        $this->OrderLineItemID = $OrderLineItemID;
        return $this;
    }
    
    /**
     * TransactionID
     * @access public
     * @param string $TransactionID 
     */
    public function TransactionID($TransactionID){
        $this->TransactionID = $TransactionID;
        return $this;
    }
}
