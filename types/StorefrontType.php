<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package StorefrontType
 */
class StorefrontType {
    
    // Fields
    private $StoreCategory2ID;
    private $StoreCategoryID;
    private $StoreName;
    private $StoreURL;
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        //StoreCategory2ID
        if(isset($this->StoreCategory2ID)){
            $xml .= '<StoreCategory2ID>'.$this->StoreCategory2ID.'</StoreCategory2ID>';
        }
        
        // StoreCategoryID
        if(isset($this->StoreCategoryID)){
            $xml .= '<StoreCategoryID>'.$this->StoreCategoryID.'</StoreCategoryID>';
        }
        
        // StoreName
        if(isset($this->StoreName)){
            $xml .= '<StoreName>'.$this->StoreName.'</StoreName>';
        }
        
        // StoreURL
        if(isset($this->StoreURL)){
            $xml .= '<StoreURL>'.$this->StoreURL.'</StoreURL>';
        }
        
        return $xml;
    }
    
    /**
     * StoreCategory2ID
     * @access public
     * @param long $StoreCategory2ID 
     */
    public function StoreCategory2ID($StoreCategory2ID){
        $this->StoreCategory2ID = $StoreCategory2ID;
        return $this;
    }
    
    /**
     * StoreCategoryID
     * @access public
     * @param long $StoreCategoryID 
     */
    public function StoreCategoryID($StoreCategoryID){
        $this->StoreCategoryID = $StoreCategoryID;
        return $this;
    }
    
    /**
     * StoreName
     * @access public
     * @param string $StoreName 
     */
    public function StoreName($StoreName){
        $this->StoreName = $StoreName;
        return $this;
    }
    
    /**
     * StoreURL
     * @access public
     * @param string $StoreURL 
     */
    public function StoreURL($StoreURL){
        $this->StoreURL = $StoreURL;
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
