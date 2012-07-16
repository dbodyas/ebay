<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package CharityType
 */
class CharityType {
    
    // Fields
    private $CharityID;
    private $CharityListing;
    private $CharityName;
    private $CharityNumber;
    private $DonationPercent;
    private $LogoURL;
    private $Mission;
    private $Status;
    
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // CharityID
        if(isset($this->CharityID)){
            $xml .= '<CharityID>'.$this->CharityID.'</CharityID>';
        }
        
        // CharityListing
        if(isset($this->CharityListing)){
            $xml .= '<CharityListing>'.$this->CharityListing.'</CharityListing>';
        }
        
        // CharityName
        if(isset($this->CharityName)){
            $xml .= '<CharityName>'.$this->CharityName.'</CharityName>';
        }
        
        // CharityNumber
        if(isset($this->CharityNumber)){
            $xml .= '<CharityNumber>'.$this->CharityNumber.'</CharityNumber>';
        }
        
        // DonationPercent
        if(isset($this->DonationPercent)){
            $xml .= '<DonationPercent>'.$this->DonationPercent.'</DonationPercent>';
        }
        
        // LogoURL
        if(isset($this->LogoURL)){
            $xml .= '<LogoURL>'.$this->LogoURL.'</LogoURL>';
        }
        
        // Mission
        if(isset($this->Mission)){
            $xml .= '<Mission>'.$this->Mission.'</Mission>';
        }
        
        // Status
        if(isset($this->Status)){
            $xml .= '<Status>'.$this->Status.'</Status>';
        }
        
        return $xml;
    }
    
    /**
     * CharityID
     * @access public
     * @param string $CharityID [0..1] 
     */
    public function CharityID($CharityID){
        $this->CharityID = $CharityID;
        return $this;
    }
    
    /**
     * CharityListing
     * @access public
     * @param boolean $CharityListing [0..1]
     */
    public function CharityListing($CharityListing){
        $this->CharityListing = $CharityListing;
        return $this;
    }
    
    /**
     * CharityName
     * @access public
     * @param string $CharityName [0..1]
     */
    public function CharityName($CharityName){
        $this->CharityName = $CharityName;
        return $this;
    }
    
    /**
     * CharityNumber
     * @access public
     * @param int $CharityNumber [0..1]
     */
    public function CharityNumber($CharityNumber){
        $this->CharityNumber = $CharityNumber;
        return $this;
    }
    
    /**
     * DonationPercent 
     * @access public
     * @param float $DonationPercent [0..1]
     */
    public function DonationPercent($DonationPercent){
        $this->DonationPercent = $DonationPercent;
        return $this;
    }
    
    /**
     * LogoURL
     * @access public
     * @param string $LogoURL [0..1]
     */
    public function LogoURL($LogoURL){
       $this->LogoURL = $LogoURL;
       return $this;
    }
    
    /**
     * Mission
     * @access public
     * @param string $Mission [0..1]
     */
    public function Mission($Mission){
        $this->Mission = $Mission;
        return $this;
    }
    
    /**
     * Status
     * @access public
     * @param CharityStatusCodeType $Status See link for values.
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CharityStatusCodeType.html
     */
    public function Status($Status){
        $this->Status = $Status;
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