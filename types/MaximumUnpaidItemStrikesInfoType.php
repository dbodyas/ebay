<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package MaximumUnpaidItemStrikesInfoType
 */
class MaximumUnpaidItemStrikesInfoType {
    
    // Fields
    private $Count;
    private $Period;
    
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // Count
        if(isset($this->Count)){
            $xml .= '<Count>'.$this->Count.'</Count>';
        }
        
        // Period
        if(isset($this->Period)){
            $xml .= '<Period>'.$this->Period.'</Period>';
        }
        
        return $xml;
    }
    
    /**
     * Count
     * @access public
     * @param int $count [0..1]
     */
    public function Count($count){
        $this->Count = $count;
        return $this;
    }
    
    /**
     * Period
     * @access public
     * @param PeriodCodeType $period [0..1] See link for values. 
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PeriodCodeType.html
     */
    public function Period($period){
        $this->Period = $period;
        return $this;
    }
}

?>
