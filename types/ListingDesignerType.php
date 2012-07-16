<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ListingDesignerType
 */
class ListingDesignerType {
    
    // Fields
    private $LayoutID;
    private $OptimalPictureSize;
    private $ThemeID;
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // LayoutID
        if(isset($this->LayoutID)){
            $xml .= '<LayoutID>'.$this->LayoutID.'</LayoutID>';
        }
        
        // OptimalPictureSize
        if(isset($this->OptimalPictureSize)){
            $xml .= '<OptimalPictureSize>'.$this->OptimalPictureSize.'</OptimalPictureSize>';
        }
        
        // ThemeID
        if(isset($this->ThemeID)){
            $xml .= '<ThemeID>'.$this->ThemeID.'</ThemeID>';
        }       
        
        return $xml;
    }
    
    /**
     * LayoutID
     * @access public
     * @param int $LayoutID 
     */
    public function LayoutID($LayoutID){
        $this->LayoutID = $LayoutID;
        return $this;        
    }
    
    /**
     * OptimalPictureSize
     * @access public
     * @param boolean $OptimalPictureSize 
     */
    public function OptimalPictureSize($OptimalPictureSize){
        $this->OptimalPictureSize = $this->_get_boolean($OptimalPictureSize);
        return $this;
    }
    
    /**
     * ThemeID
     * @access public
     * @param int $ThemeID 
     */
    public function ThemeID($ThemeID){
        $this->ThemeID = $ThemeID;
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
