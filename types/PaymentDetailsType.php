<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package PaymentDetailsType
 */
class PaymentDetailsType {
    
    // Fields
    private $DaysToFullPayment;
    private $DepositAmount;
    private $DepositAmount_AmountType;
    private $DepositType;
    private $HoursToDeposit;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){

        $xml = FALSE;
        
        // DaysToFullPayment
        if(isset($this->DaysToFullPayment)){
            $xml .= '<DaysToFullPayment>'.$this->DaysToFullPayment.'</DaysToFullPayment>';
        }
        
        // DepositAmount
        if(isset($this->DepositAmount)){
            $xml .= '<DepositAmount';
            
            if(isset($this->DepositAmount_AmountType)){
                $xml .= ' currencyID="'.$this->DepositAmount_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->DepositAmount.'</DepositAmount>';
        }
        
        // DepositType
        if(isset($this->DepositType)){
            $xml .= '<DepositType>'.$this->DepositType.'</DepositType>';
        }
        
        // HoursToDeposit
        if(isset($this->HoursToDeposit)){
            $xml .= '<HoursToDeposit>'.$this->HoursToDeposit.'</HoursToDeposit>';
        }
        
        return $xml;
    }
    
    /**
     * DaysToFullPayment
     * @access public
     * @param int $DaysToFullPayment 
     */
    public function DaysToFullPayment($DaysToFullPayment){
        $this->DaysToFullPayment = $DaysToFullPayment;
        return $this;
    }
    
    /**
     * DepositAmount
     * @param double $DepositAmount
     * @param CurrencyCodeType $AmountType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html
     */
    public function DepositAmount($DepositAmount,$AmountType = ''){
        $this->DepositAmount = $DepositAmount;
        $this->DepositAmount_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * DepositType
     * @access public
     * @param DepositTypeCodeType $DepositTypeCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DepositTypeCodeType.html
     */
    public function DepositType($DepositTypeCodeType){
        $this->DepositType = $DepositTypeCodeType;
        return $this;
    }
    
    /**
     * HoursToDeposit
     * @access public
     * @param int $HoursToDeposit 
     */
    public function HoursToDeposit($HoursToDeposit){
        $this->HoursToDeposit = $HoursToDeposit;
        return $this;
        
    }
    
}