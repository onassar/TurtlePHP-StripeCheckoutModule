<?php

    // namespaces
    namespace Modules\Stripe;

    /**
     * Plugin/vendors Requirements
     * 
     */

    // hash
    $required = array(
        '\Plugin\Config' => 'TurtlePHP-ConfigPlugin',
        '\Modules\Users' => 'TurtlePHP-UsersModule',
        'Stripe_Customer' => 'stripe-php',
        'Schema' => 'PHP-JSON-Validation',
        'SmartSchema' => 'PHP-JSON-Validation',
        'Schema' => 'PHP-JSON-Validation'
    );

    // checks
    foreach ($required as $class => $package) {
        if (!class_exists($class)) {
            throw new \Exception(
                'Class *' . ($class) . '* couldn\'t be found. Ensure it, and ' .
                'it\'s associated library (' . ($package) . ') are properly ' .
                'included.'
            );
        }
    }

    /**
     * Application requirements
     * 
     */

    // hash
    $required = array(
        'StripeWebhooksController'
    );

    // checks
    foreach ($required as $class) {
        if (!class_exists($class)) {
            throw new \Exception(
                'Class *' . ($class) . '* couldn\'t be found. Load it!'
            );
        }
    }
