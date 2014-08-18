<?php

    // namespaces
    namespace Modules\StripeCheckout;

    // Path/view settings
    $paths = getConfig('paths');

    // add module routes to application
    \Turtle\Application::addRoutes(array(
        '^' . ($paths['']) . '$' => array(// G
            'module' => true,
            'controller' => 'Modules\Users\Emails',
            'action' => 'actionLoginBypass'
        ),
        '^' . ($paths['emails']['resetPassword']) . '$' => array(// G
            'module' => true,
            'controller' => 'Modules\Users\Emails',
            'action' => 'actionResetPassword'
        )
    ));
