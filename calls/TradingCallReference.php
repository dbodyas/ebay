<?php

namespace rearley\Ebay\Calls;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package TradingCallReference
 */
class TradingCallReference {

    // Fields
    private $ErrorLanguage;
    private $MessageID;
    private $Version;
    private $WarningLevel;
    
    /**
     * ErrorLanguage
     * @access public
     * @param string $ErrorLanguage 
     */
    public function ErrorLanguage($ErrorLanguage){
        $this->ErrorLanguage = $ErrorLanguage;
        return $this;
    }
    
    /**
     * MessageID
     * @access public
     * @param string $MessageID 
     */
    public function MessageID($MessageID){
        $this->MessageID = $MessageID;
        return $this;
    }
    
    /**
     * Version
     * @access public
     * @param string $Version 
     */
    public function Version($Version){
        $this->Version = $Version;
        return $this;
    }
    
    /**
     * WarningLevel
     * @access public
     * @param WarningLevelCodeType $WarningLevelCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/ebay/types/WarningLevelCodeType.html
     */
    public function WarningLevel($WarningLevelCodeType){
        $this->WarningLevel = $WarningLevelCodeType;
        return $this;
    }    
    
    /**
     * Returns 1/0 for boolean check
     * @param string|boolean $field
     * @return int 
     */
    private function _get_boolean($field) {

        $boolean = '';

        if (is_bool($field)) {
            if ($field) {
                $boolean = '1';
            } else {
                $boolean = '0';
            }
        } else {
            if (strtolower($field) == 'true') {
                $boolean = '1';
            } else {
                $boolean = '0';
            }
        }

        return $boolean;
    }

}
