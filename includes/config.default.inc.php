<?php

    // namespaces
    namespace Modules\StripeCheckout;

    // 
    $applyTaxes = true;
    $currency = 'usd';
    $province = 'ontario';

    /**
     * Credentials
     * 
     */
    $credentials = array(
        'test' => array(
            'secretKey' => 'sk_test_***',
            'publishableKey' => 'pk_test_***'
        ),
        'live' => array(
            'secretKey' => 'sk_live_***',
            'publishableKey' => 'pk_live_***'
        ),
    );

    // config storage
    \Plugin\Config::add(
        'TurtlePHP-StripeCheckoutModule',
        array(
            'applyTaxes' => $applyTaxes,
            'currency' => $currency,
            'credentials' => $credentials
        )
    );
