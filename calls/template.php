<?php

namespace rearley\Ebay\Calls;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AddDisputeResponse
 */
class AddDisputeResponse extends \rearley\Ebay\Calls\TradingCallReference {
    
    // Fields

    
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
        
        
        // Closing tag(s)
        $xml .= '</AddDisputeRequest>';
        
        return $xml;
    }
    
}
