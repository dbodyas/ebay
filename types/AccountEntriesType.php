<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package AccountEntriesType
 */
class AccountEntriesType {
    
    // Types
    private $AccountEntry; // AccountEntryType
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // AccountEntry
        if(isset($this->AccountEntry)){
            foreach($this->AccountEntry as $ae){
                $xml .= '<AccountEntry>';
                $xml .= $ae->build();
                $xml .= '</AccountEntry>';
            }
        }
        
        return $xml;
    }
    
    /**
     * AccountEntry
     * @access public
     * @param AccountEntryType[] $AccountEntryType 
     */
    public function AccountEntry($AccountEntryType){
        if(is_array($AccountEntryType)){
            $this->AccountEntry = $AccountEntryType;
        } else {
            $this->AccountEntry = array($AccountEntryType);
        }
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
