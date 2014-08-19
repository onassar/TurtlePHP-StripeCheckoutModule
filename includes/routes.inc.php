<?php

    // namespaces
    namespace Modules\Stripe;

    // Path/view settings
    $paths = getConfig('paths');

    // add module routes to application
    \Turtle\Application::addRoutes(array(
        '^' . ($paths['webhooks']) . '$' => array(// G
            'module' => true,
            'controller' => 'Modules\Stripe\Webhooks',
            'action' => 'actionIndex'
        )
    ));
