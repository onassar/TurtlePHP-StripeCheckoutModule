<?php

    // namespaces
    namespace Modules\StripeCheckout;

    /**
     * getConfig
     * 
     * @access public
     * @return mixed
     */
    function getConfig()
    {
        $args = func_get_args();
        return call_user_func_array(
            array('\Modules\StripeCheckout', 'getConfig'),
            $args
        );
    }
