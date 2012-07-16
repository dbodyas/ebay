<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package BuyerRequirementDetailsType
 */
class BuyerRequirementDetailsType {
    
    // Fields
    private $LinkedPayPalAccount;
    private $MinimumFeedbackScore;
    private $ShipToRegistrationCountry;
    private $VerifiedUserRequirements;
    private $ZeroFeedbackScore;

    // Types
    private $MaximumBuyerPolicyViolations; // MaximumBuyerPolicyViolationsType
    private $MaximumItemRequirements; // MaximumItemRequirementsType
    private $MaximumUnpaidItemStrikesInfo; // MaximumUnpaidItemStrikesInfoType 
    
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // LinkedPayPalAccount
        if(isset($this->LinkedPayPalAccount)){
            $xml .= '<LinkedPayPalAccount>'.$this->LinkedPayPalAccount.'</LinkedPayPalAccount>';
        }
        
        // MaximumBuyerPolicyViolations
        if(isset($this->MaximumBuyerPolicyViolations)){
            $xml .= '<MaximumBuyerPolicyViolations>';
            $xml .= $this->MaximumBuyerPolicyViolations->build();
            $xml .= '</MaximumBuyerPolicyViolations>';
        }
        
        // MaximumItemRequirements
        if(isset($this->MaximumItemRequirements)){
            
            $xml .= '<MaximumItemRequirements>';
            $xml .= $this->MaximumItemRequirements->build();            
            $xml .= '</MaximumItemRequirements>';
        }
        
        // MaximumUnpaidItemStrikesInfo
        if(isset($this->MaximumUnpaidItemStrikesInfo)){
            $xml .= '<MaximumUnpaidItemStrikesInfo>';
            $xml .= $this->MaximumUnpaidItemStrikesInfo->build();
            $xml .= '</MaximumUnpaidItemStrikesInfo>';
        }
        
        // MinimumFeedbackScore
        if(isset($this->MinimumFeedbackScore)){
            $xml .= '<MinimumFeedbackScore>'.$this->MinimumFeedbackScore.'</MinimumFeedbackScore>';
        }
        
        // ShipToRegistrationCountry
        if(isset($this->ShipToRegistrationCountry)){
            $xml .= '<ShipToRegistrationCountry>'.$this->ShipToRegistrationCountry.'</ShipToRegistrationCountry>';
        }
        
        // VerifiedUserRequirements
        if(isset($this->VerifiedUserRequirements)){
            $xml .= '<VerifiedUserRequirements>';
            $xml .= $this->VerifiedUserRequirements->build();
            $xml .= '</VerifiedUserRequirements>';
        }
        
        // ZeroFeedbackScore
        if(isset($this->ZeroFeedbackScore)){
            $xml .= '<ZeroFeedbackScore>'.$this->ZeroFeedbackScore.'</ZeroFeedbackScore>';
        }        
        
        return $xml;
    }
    
    /**
     * LinkedPayPalAccount
     * @access public
     * @param boolean $LinkedPayPalAccount 
     */
    public function LinkedPayPalAccount($LinkedPayPalAccount){
        $this->LinkedPayPalAccount = $this->_get_boolean($LinkedPayPalAccount);
        return $this;
    }
    
    /**
     * MaximumBuyerPolicyViolations
     * @access public
     * @param MaximumBuyerPolicyViolationsType $MaximumBuyerPolicyViolationsType [0..1]
     */
    public function MaximumBuyerPolicyViolations($MaximumBuyerPolicyViolationsType){
        $this->MaximumBuyerPolicyViolations = $MaximumBuyerPolicyViolationsType;
        return $this;
    }
    
    /**
     * MaximumItemRequirements
     * @access public
     * @param MaximumItemRequirementsType $MaximumItemRequirementsType [0..1]
     */
    public function MaximumItemRequirements($MaximumItemRequirementsType){
        $this->MaximumItemRequirements = $MaximumItemRequirementsType;
        return $this;
    }
    
    /**
     * MaximumUnpaidItemStrikesInfo
     * @access public
     * @param MaximumUnpaidItemStrikesInfoType $MaximumUnpaidItemStrikesInfoType [0..1]
     */
    public function MaximumUnpaidItemStrikesInfo($MaximumUnpaidItemStrikesInfoType){
        $this->MaximumUnpaidItemStrikesInfo = $MaximumUnpaidItemStrikesInfoType;
        return $this;
    }
    
    /**
     * MinimumFeedbackScore
     * @access public
     * @param int $MinimumFeedbackScore [0..1]
     */
    public function MinimumFeedbackScore($MinimumFeedbackScore){
        $this->MinimumFeedbackScore = $MinimumFeedbackScore;
        return $this;
    }
    
    /**
     * ShipToRegistrationCountry
     * @access public
     * @param boolean $ShipToRegistrationCountry 
     */
    public function ShipToRegistrationCountry($ShipToRegistrationCountry){
        $this->ShipToRegistrationCountry = $this->_get_boolean($ShipToRegistrationCountry);
        return $this;
    }
    
    /**
     * VerifiedUserRequirements
     * @access public
     * @param VerifiedUserRequirements $VerifiedUserRequirements [0..1]
     */
    public function VerifiedUserRequirements($VerifiedUserRequirements){
        $this->VerifiedUserRequirements = $VerifiedUserRequirements;
        return $this;
    }
    
    /**
     * ZeroFeedbackScore
     * @access public
     * @param boolean $ZeroFeedbackScore 
     */
    public function ZeroFeedbackScore($ZeroFeedbackScore){
        $this->ZeroFeedbackScore = $this->_get_boolean($ZeroFeedbackScore);
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

?>
