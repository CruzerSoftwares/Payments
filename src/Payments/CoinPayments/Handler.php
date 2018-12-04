<?php

namespace Cruzer\Payments\CoinPayments;

use Cruzer\Payments\CoinPayments\CoinpaymentsAPI;

/**
 * This class handles transaction Creation and other commands
 * 
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since version 1.0.0. Date: 2nd Dec, 2018
 */

class Handler extends CoinpaymentsAPI{

    private $private_key;
    private $public_key;
    private $format;
    private $api;

    // Create an api instance of CoinpaymentsAPI
    public function __construct($private_key, $public_key, $format) {
        $this->api = new CoinpaymentsAPI($private_key, $public_key, $format);
    }

    /**
     * Initiate a single Transaction
     *
     * @author RN Kushwaha <rn.kushwaha022@gmail.com>
     * @since  1.0.4
     * @param  array $options
     * @return array Initiated Transaction Details
     */
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

    /**
     * get details of a single Transaction
     *
     * @author RN Kushwaha <rn.kushwaha022@gmail.com>
     * @since  1.0.6
     * @param  string $transaction_id
     * @return array Single Transaction Details
     */
    public function getTransactionInfo($transaction_id){
        if( $transaction_id == '' ){
            return ['error' => 'transaction_id is missing!'];
        }

        return $this->api->GetTxInfoSingle($transaction_id);
    }

}

