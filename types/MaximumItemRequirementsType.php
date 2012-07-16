<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package MaximumItemRequirementsType
 */
class MaximumItemRequirementsType {
    
    // Fields
    private $MaximumItemCount;
    private $MinimumFeedbackScore;
    
    
    /**
     * Builds XML
     * @access public 
     */
    public function build(){
        
        $xml = FALSE;
        
        // MaximumItemCount 
        if(isset($this->MaximumItemCount )){
            $xml .= '<MaximumItemCount>'.$this->MaximumItemCount .'</MaximumItemCount>';
        }
        
        // MinimumFeedbackScore
        if(isset($this->MinimumFeedbackScore)){
            $xml .= '<MinimumFeedbackScore>'.$this->MinimumFeedbackScore.'</MinimumFeedbackScore>';
        }
        
        return $xml;
    }
    
    /**
     * MaximumItemCount
     * @access public
     * @param int $MaximumItemCount [0..1]
     */
    public function MaximumItemCount($MaximumItemCount){
        $this->MaximumItemCount = $MaximumItemCount;
        return $this;
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
}

?>
