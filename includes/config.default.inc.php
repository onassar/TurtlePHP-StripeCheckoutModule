<?php

    // namespaces
    namespace Modules\Stripe;

    // 
    $applyTaxes = true;
    $currency = 'usd';

    /**
     * Credentials
     * 
     */
    $credentials = array(
        'secretKey' => 'sk_test_***',
        'publishableKey' => 'pk_test_***'
    );

    /**
     * Paths
     * 
     */
    $paths = array(
        'webhooks' => '/stripe/webhooks'
    );

    // config storage
    \Plugin\Config::add(
        'TurtlePHP-StripeModule',
        array(
            'applyTaxes' => $applyTaxes,
            'currency' => $currency,
            'credentials' => $credentials,
            'paths' => $paths
        )
    );
