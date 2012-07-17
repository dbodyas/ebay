<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AccountEntryType
 */
class AccountEntryType {
    
    // Fields
    private $AccountDetailsEntryType;
    private $Balance;
    private $Balance_AmountType;
    private $ConversionRate;
    private $ConversionRate_AmountType;
    private $Date;
    private $Description;
    private $GrossDetailAmount;
    private $GrossDetailAmount_AmountType;
    private $ItemID;
    private $Memo;
    private $NetDetailAmount;
    private $NetDetailAmount_AmountType;
    private $OrderLineItemID;
    private $ReceivedTopRatedDiscount;
    private $RefNumber;
    private $Title;
    private $TransactionID;
    private $VATPercent;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // AccountDetailsEntryType
        if(isset($this->AccountDetailsEntryType)){
            $xml .= '<AccountDetailsEntryType>'.$this->AccountDetailsEntryType.'</AccountDetailsEntryType>';
        }
        
        // Balance
        if(isset($this->Balance)){
            $xml .= '<Balance';
            
            if(isset($this->Balance_AmountType)){
                $xml .= ' currencyID="'.$this->Balance_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->Balance.'</Balance>';
        }
        
        // ConversionRate
        if(isset($this->ConversionRate)){
            $xml .= '<ConversionRate';
            
            if(isset($this->ConversionRate_AmountType)){
                $xml .= ' currencyID="'.$this->ConversionRate_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->ConversionRate.'</ConversionRate>';
        }
        
        // Date
        if(isset($this->Date)){
            $xml .= '<Date>'.$this->Date.'</Date>';
        }
        
        // Description
        if(isset($this->Description)){
            $xml .= '<Description>'.$this->Description.'</Description>';
        }
        
        // GrossDetailAmount
        if(isset($this->GrossDetailAmount)){
            $xml .= '<GrossDetailAmount';
            
            if(isset($this->GrossDetailAmount_AmountType)){
                $xml .= ' currencyID="'.$this->GrossDetailAmount_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->GrossDetailAmount.'</GrossDetailAmount>';
        }
        
        // ItemID
        if(isset($this->ItemID)){
            $xml .= '<ItemID>'.$this->ItemID.'</ItemID>';
        }
        
        // Memo
        if(isset($this->Memo)){
            $xml .= '<Memo>'.$this->Memo.'</Memo>';
        }
        
        // NetDetailAmount
        if(isset($this->NetDetailAmount)){
            $xml .= '<NetDetailAmount';
            
            if(isset($this->NetDetailAmount_AmountType)){
                $xml .= ' currencyID="'.$this->NetDetailAmount_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->NetDetailAmount.'</NetDetailAmount>';
        }
        
        // OrderLineItemID
        if(isset($this->OrderLineItemID)){
            $xml .= '<OrderLineItemID>'.$this->OrderLineItemID.'</OrderLineItemID>';
        }
        
        // ReceivedTopRatedDiscount
        if(isset($this->ReceivedTopRatedDiscount)){
            $xml .= '<ReceivedTopRatedDiscount>'.$this->ReceivedTopRatedDiscount.'</ReceivedTopRatedDiscount>';
        }
        
        // RefNumber
        if(isset($this->RefNumber)){
            $xml .= '<RefNumber>'.$this->RefNumber.'</RefNumber>';
        }
        
        // Title
        if(isset($this->Title)){
            $xml .= '<Title>'.$this->Title.'</Title>';
        }
        
        // TransactionID
        if(isset($this->TransactionID)){
            $xml .= '<TransactionID>'.$this->TransactionID.'</TransactionID>';
        }
        
        // VATPercent
        if(isset($this->VATPercent)){
            $xml .= '<VATPercent>'.$this->VATPercent.'</VATPercent>';
        }
        
        return $xml;
    }
    
    /**
     * AccountDetailsEntryType
     * @access public
     * @param AccountDetailEntryCodeType $AccountDetailEntryCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/AccountDetailEntryCodeType.html
     */
    public function AccountDetailsEntryType($AccountDetailEntryCodeType){
        $this->AccountDetailsEntryType = $AccountDetailEntryCodeType;
        return $this;
    }
    
    /**
     * Balance
     * @access public
     * @param double $Balance
     * @param CurrencyCodeType $AmountType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html
     */
    public function Balance($Balance,$AmountType = ''){
        $this->Balance = $Balance;
        $this->Balance_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * ConversionRate
     * @access public
     * @param double $ConversionRate
     * @param CurrencyCodeType $AmountType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html 
     */
    public function ConversionRate($ConversionRate,$AmountType = ''){
        $this->ConversionRate = $ConversionRate;
        $this->ConversionRate_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * Date
     * @access public
     * @param dateTime $Date 
     */
    public function Date($Date){
        $this->Date = $Date;
        return $this;
    }
    
    /**
     * Description
     * @access public
     * @param string $Description 
     */
    public function Description($Description){
        $this->Description = $Description;
        return $this;
    }
    
    /**
     * GrossDetailAmount
     * @access public
     * @param double $GrossDetailAmount
     * @param CurrencyCodeType $AmountType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html 
     */
    public function GrossDetailAmount($GrossDetailAmount,$AmountType){
        $this->GrossDetailAmount = $GrossDetailAmount;
        $this->GrossDetailAmount_AmountType = $AmountType;
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
     * Memo
     * @access public
     * @param string $Memo 
     */
    public function Memo($Memo){
        $this->Memo = $Memo;
        return $this;
    }
    
    /**
     * NetDetailAmount
     * @access public
     * @param double $NetDetailAmount
     * @param CurrencyCodeType $AmountType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html 
     */
    public function NetDetailAmount($NetDetailAmount,$AmountType){
        $this->NetDetailAmount = $NetDetailAmount;
        $this->NetDetailAmount_AmountType = $AmountType;
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
     * ReceivedTopRatedDiscount
     * @access public
     * @param boolean $ReceivedTopRatedDiscount 
     */
    public function ReceivedTopRatedDiscount($ReceivedTopRatedDiscount){
        $this->ReceivedTopRatedDiscount = $this->_get_boolean($ReceivedTopRatedDiscount);
        return $this;
    }
    
    /**
     * RefNumber
     * @access public
     * @param string $RefNumber 
     */
    public function RefNumber($RefNumber){
        $this->RefNumber = $RefNumber;
        return $this;
    }
    
    /**
     * Title
     * @access public
     * @param string $Title 
     */
    public function Title($Title){
        $this->Title = $Title;
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
    
    /**
     * VATPercent
     * @access public
     * @param decimal $VATPercent 
     */
    public function VATPercent($VATPercent){
        $this->VATPercent = $VATPercent;
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
