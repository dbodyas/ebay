<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package VerifiedUserRequirementsType
 */
class VerifiedUserRequirementsType {
    
    // Fields
    private $MinimumFeedbackScore;
    private $VerifiedUser;
    
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // MinimumFeedbackScore
        if(isset($this->MinimumFeedbackScore)){
            $xml .= '<MinimumFeedbackScore>'.$this->MinimumFeedbackScore.'</MinimumFeedbackScore>';
        }
        
        // VerifiedUser
        if(isset($this->VerifiedUser)){
            $xml .= '<VerifiedUser>'.$this->VerifiedUser.'</VerifiedUser>';
        }
        
        return $xml;
    }
    
    /**
     * MinimumFeedbackScore
     * @access public
     * @param int $MinimumFeedbackScore [0..1]
     */
    public function MinimumFeedbackScore($MinimumFeedbackScore){
        $this->MinimumFeedbackScore = $MinimumFeedbackScore;
        return $this;
    }
    
    /**
     * VerifiedUser
     * @access public
     * @param boolean $VerifiedUser [0..1]
     */
    public function VerifiedUser($VerifiedUser){
        $this->VerifiedUser = $this->_get_boolean($VerifiedUser);
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
