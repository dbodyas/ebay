<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AddDisputeRequestType
 */
class AddDisputeRequestType {
    
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
        
        $xml = FALSE;
        
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
        
        return $xml;
    }
    
    /**
     * DisputeExplanation
     * @access public
     * @param DisputeExplanationCodeType $DisputeExplanation 
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeExplanationCodeType.html
     */
    public function DisputeExplanation($DisputeExplanationCodeType){
        $this->DisputeExplanation = $DisputeExplanationCodeType;
        return $this;
    }
    
    /**
     * DisputeReason
     * @access public
     * @param DisputeReasonCodeType $DisputeReasonCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeReasonCodeType.html
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
