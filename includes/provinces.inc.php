<?php

    // namespaces
    namespace Modules\StripeCheckout;

    // Tax information
    $provinces = array(
        array(
            'handle' => 'ab',
            'name' => 'Alberta',
            'hst' => 0,
            'gst' => 5,
            'pst' => 0,
            'total' => 5,
            'taxableRate' => 5,
            'taxName' => 'GST'
        ),
        array(
            'handle' => 'bc',
            'name' => 'British Columbia',
            'hst' => 0,
            'gst' => 5,
            'pst' => 7,
            'total' => 12,
            'taxableRate' => 5,
            'taxName' => 'GST'
        ),
        array(
            'handle' => 'mb',
            'name' => 'Manitoba',
            'hst' => 0,
            'gst' => 5,
            'pst' => 8,
            'total' => 13,
            'taxableRate' => 5,
            'taxName' => 'GST'
        ),
        array(
            'handle' => 'nb',
            'name' => 'New Brunswick',
            'hst' => 13,
            'gst' => 0,
            'pst' => 0,
            'total' => 13,
            'taxableRate' => 13,
            'taxName' => 'HST'
        ),
        array(
            'handle' => 'nl',
            'name' => 'Newfoundland and Labrador',
            'hst' => 13,
            'gst' => 0,
            'pst' => 0,
            'total' => 13,
            'taxableRate' => 13,
            'taxName' => 'HST'
        ),
        array(
            'handle' => 'nt',
            'name' => 'Northwest Territories',
            'hst' => 0,
            'gst' => 5,
            'pst' => 0,
            'total' => 5,
            'taxableRate' => 5,
            'taxName' => 'GST'
        ),
        array(
            'handle' => 'ns',
            'name' => 'Nova Scotia',
            'hst' => 15,
            'gst' => 0,
            'pst' => 0,
            'total' => 15,
            'taxableRate' => 15,
            'taxName' => 'HST'
        ),
        array(
            'handle' => 'nu',
            'name' => 'Nunavut',
            'hst' => 0,
            'gst' => 5,
            'pst' => 0,
            'total' => 5,
            'taxableRate' => 5,
            'taxName' => 'GST'
        ),
        array(
            'handle' => 'on',
            'name' => 'Ontario',
            'hst' => 13,
            'gst' => 0,
            'pst' => 0,
            'total' => 13,
            'taxableRate' => 13,
            'taxName' => 'HST'
        ),
        array(
            'handle' => 'pe',
            'name' => 'Prince Edward Island',
            'hst' => 14,
            'gst' => 0,
            'pst' => 0,
            'total' => 14,
            'taxableRate' => 14,
            'taxName' => 'HST'
        ),
        array(
            'handle' => 'qc',
            'name' => 'Quebec',
            'hst' => 0,
            'gst' => 5,
            'pst' => 9.975,
            'total' => 14.975,
            'taxableRate' => 5,
            'taxName' => 'GST'
        ),
        array(
            'handle' => 'sk',
            'name' => 'Saskatchewan',
            'hst' => 0,
            'gst' => 5,
            'pst' => 5,
            'total' => 10,
            'taxableRate' => 5,
            'taxName' => 'GST'
        ),
        array(
            'handle' => 'yt',
            'name' => 'Yukon',
            'hst' => 0,
            'gst' => 5,
            'pst' => 0,
            'total' => 5,
            'taxableRate' => 5,
            'taxName' => 'GST'
        )
    );

    // config storage
    \Plugin\Config::add(
        'TurtlePHP-StripeCheckoutModule',
        array(
            'provinces' => $provinces
        )
    );
