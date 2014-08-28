<?php

    // namespaces
    namespace Modules\Stripe;

    // 
    $applyTaxes = true;
    $frequencyToggle = true;
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
            'frequencyToggle' => $frequencyToggle,
            'currency' => $currency,
            'credentials' => $credentials,
            'paths' => $paths
        )
    );
