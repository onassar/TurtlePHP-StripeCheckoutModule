<?php

    // namespaces
    namespace Modules\StripeCustomers;

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
            array('\Modules\StripeCustomers', 'getConfig'),
            $args
        );
    }
