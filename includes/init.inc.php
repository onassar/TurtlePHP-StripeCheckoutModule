<?php

    // namespaces
    namespace Modules\Stripe;

    // closure (variable scope preservation)
    $closure = function() {

        // grab parent directory
        $info = pathinfo(__DIR__);
        $parent = $info['dirname'];

        // module path
        DEFINE(__NAMESPACE__ . '\MODULE', $parent);

        // include models, controllers, helpers
        require_once MODULE . '/includes/validation/ProjectSchemaValidator.class.php';

        // flow includes
        require_once MODULE . '/functions/local.inc.php';
        require_once 'provinces.inc.php';
        require_once 'requirements.inc.php';
        require_once \Modules\Users::getConfigPath();
        require_once 'routes.inc.php';
    };

    // run/clear
    $closure();
    unset($closure);
