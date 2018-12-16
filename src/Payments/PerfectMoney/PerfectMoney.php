<?php

namespace Cruzer\Payments;

/**
 * This class handles transaction Creation and other commands
 * 
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since version 1.0.0. Date: 2nd Dec, 2018
 */

class PerfectMoney{
    private $api;

    // Create an api instance of PerfectMoney
    public function __construct($private_key, $public_key, $format) {
        $this->api = new PayeerAPI();
    }

    /**
     * Initiate a single Transaction
     *
     * @author RN Kushwaha <rn.kushwaha022@gmail.com>
     * @since  1.0.4
     * @param  array $options
     * @return array Initiated Transaction Details
     */
    public function isWorkingCheck($options = array()){
        echo $this->api->is_working();
    }


}

