<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Extended Security.
 * 
 * @package SaveInTeam
 * @category Security
 * @author Hète.ca Team
 * @copyright (c) 2013, Hète.ca In 
 */
class Security extends Kohana_Security {

    /**
     * Generates an unique identifier during all the request.
     * @return string
     */
    public static function unique_id($more_entropy = FALSE) {
        return sha1(uniqid("", $more_entropy));
    }

    public static function strip_blank_characters($str) {
        return trim($str);
    }

}

?>
