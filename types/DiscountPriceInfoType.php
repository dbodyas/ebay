<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package DiscountPriceInfoType
 */
class DiscountPriceInfoType {
    
    // Fields
    private $MadeForOutletComparisonPrice;
    private $MadeForOutletComparisonPrice_AmountType;
    private $MinimumAdvertisedPrice;
    private $MinimumAdvertisedPrice_AmountType;
    private $MinimumAdvertisedPriceExposure;
    private $OriginalRetailPrice;
    private $OriginalRetailPrice_AmountType;
    private $PricingTreatment;
    private $SoldOffeBay;
    private $SoldOneBay;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // MadeForOutletComparisonPrice
        if(isset($this->MadeForOutletComparisonPrice)){
            
            $xml .= '<MadeForOutletComparisonPrice';
            
            if(isset($this->MadeForOutletComparisonPrice_AmountType)){
                $xml .= ' currencyID="'.$this->MadeForOutletComparisonPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            $xml .= $this->MadeForOutletComparisonPrice;
            $xml .= '</MadeForOutletComparisonPrice>';            
        }
        
        // MinimumAdvertisedPrice
        if(isset($this->MinimumAdvertisedPrice)){
            $xml .= '<MinimumAdvertisedPrice';
            
            if(isset($this->MinimumAdvertisedPrice_AmountType)){
                $xml .= ' currencyID="'.$this->MinimumAdvertisedPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            $xml .= $this->MinimumAdvertisedPrice;
            $xml .= '</MinimumAdvertisedPrice>'; 
        }
        
        // MinimumAdvertisedPriceExposure
        if(isset($this->MinimumAdvertisedPriceExposure)){
            $xml .= '<MinimumAdvertisedPriceExposure>'.$this->MinimumAdvertisedPriceExposure.'</MinimumAdvertisedPriceExposure>';
        }
        
        // OriginalRetailPrice
        if(isset($this->OriginalRetailPrice)){
            $xml .= '<OriginalRetailPrice';
            
            if(isset($this->OriginalRetailPrice_AmountType)){
                $xml .= ' currencyID="'.$this->OriginalRetailPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            $xml .= $this->OriginalRetailPrice;
            $xml .= '</OriginalRetailPrice>';
        }
        
        // PricingTreatment 
        if(isset($this->PricingTreatment)){
            $xml .= '<PricingTreatment>'.$this->PricingTreatment.'</PricingTreatment>';
        }
        
        // SoldOffeBay
        if(isset($this->SoldOffeBay)){
            $xml .= '<SoldOffeBay>'.$this->SoldOffeBay.'</SoldOffeBay>';
        }
        
        // SoldOneBay
        if(isset($this->SoldOneBay)){
            $xml .= '<SoldOneBay>'.$this->SoldOneBay.'</SoldOneBay>';
        }
                
        return $xml;
    }
    
    /**
     * MadeForOutletComparisonPrice
     * @access public
     * @param double $MadeForOutletComparisonPrice
     * @param AmountType $AmountType 
     */
    public function MadeForOutletComparisonPrice($MadeForOutletComparisonPrice, $AmountType = ''){
        $this->MadeForOutletComparisonPrice = $MadeForOutletComparisonPrice;
        $this->MadeForOutletComparisonPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * MinimumAdvertisedPrice
     * @param double $MinimumAdvertisedPrice
     * @param AmountType $AmountType 
     */
    public function MinimumAdvertisedPrice($MinimumAdvertisedPrice,$AmountType = ''){
        $this->MinimumAdvertisedPrice = $MinimumAdvertisedPrice;
        $this->MinimumAdvertisedPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * MinimumAdvertisedPriceExposure
     * @access public
     * @param MinimumAdvertisedPriceExposureCodeType $MinimumAdvertisedPriceExposure 
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MinimumAdvertisedPriceExposureCodeType.html
     */
    public function MinimumAdvertisedPriceExposure($MinimumAdvertisedPriceExposure){
        $this->MinimumAdvertisedPriceExposure = $MinimumAdvertisedPriceExposure;
        return $this;
    }
    
    /**
     * OriginalRetailPrice
     * @access public
     * @param double $OriginalRetailPrice
     * @param AmountType $AmountType
     */
    public function OriginalRetailPrice($OriginalRetailPrice,$AmountType = ''){
        $this->OriginalRetailPrice = $OriginalRetailPrice;
        $this->OriginalRetailPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * PricingTreatment
     * @access public
     * @param PricingTreatmentCodeType $PricingTreatment
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PricingTreatmentCodeType.html
     */
    public function PricingTreatment($PricingTreatment){
        $this->PricingTreatment = $PricingTreatment;
        return $this;
    }
    
    /**
     * SoldOffeBay
     * @access public
     * @param boolean $SoldOffeBay 
     */
    public function SoldOffeBay($SoldOffeBay){
        $this->SoldOffeBay = $this->_get_boolean($SoldOffeBay);
        return $this;
    }
    
    /**
     * SoldOneBay
     * @access public
     * @param boolean $SoldOneBay
     */
    public function SoldOneBay($SoldOneBay){
        $this->SoldOneBay = $this->_get_boolean($SoldOneBay);
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