<?php

namespace Cruzer\Payments\CoinPayments;

/**
 * This class handles transaction
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since version 1. Date: 2nd Dec, 2018
 */

class Handler extends CoinpaymentsAPI{

    private $private_key;
    private $public_key;
    private $format;
    private $api;

    public function __construct() {
        $this->api     = new CoinpaymentsAPI($private_key, $public_key, $format);
    }

    public function AddTransaction($options = array()){
        if( !isset($options['currency1']) ){
            $options['currency1'] = $options['currency'];
        }
        if( !isset($options['currency2']) ){
            $options['currency2'] = $options['currency1'];
        }

        return $this->api->CreateComplexTransaction(
            $options['amount'],
            $options['currency1'],
            $options['currency2'],
            $options['buyer_email'],
            $options['address'],
            $options['buyer_name'],
            $options['item_name'],
            $options['item_number'],
            $options['invoice'],
            $options['custom'],
            $options['ipn_url']
        );
    }
}

