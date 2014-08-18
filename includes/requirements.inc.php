<?php

    // namespaces
    namespace Modules\StripeCheckout;

    /**
     * Plugin/vendors Requirements
     * 
     */

    // hash
    $required = array(
        '\Plugin\Config' => 'TurtlePHP-ConfigPlugin',
        'Stripe_Customer' => 'stripe-php'
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
        'StripeCheckout'
    );

    // checks
    foreach ($required as $class) {
        if (!class_exists($class)) {
            throw new \Exception(
                'Class *' . ($class) . '* couldn\'t be found. Load it!'
            );
        }
    }
