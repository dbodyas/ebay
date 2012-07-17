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
