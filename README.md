TurtlePHP-StripeModule
======================

### Depdencies
All the submodules listed below

### Routes

`/stripe/webhooks`  
`GET`  

### Install and init flows

```
cd ~/Sites/domain.com
git submodule add git@github.com:onassar/TurtlePHP-ConfigPlugin.git TurtlePHP/application/plugins/TurtlePHP-ConfigPlugin
git submodule add git@github.com:onassar/TurtlePHP-UsersModule.git TurtlePHP/modules/TurtlePHP-UsersModule
git submodule add git@github.com:onassar/TurtlePHP-StripeModule.git TurtlePHP/modules/TurtlePHP-StripeModule
```

``` php
require_once APP . '/controllers/StripeWebhooks.class.php';
require_once APP . '/vendors/stripe-php-master/lib/Stripe.php';
require_once APP . '/modules/TurtlePHP-StripeModule/Stripe.class.php';
require_once APP . '/modules/TurtlePHP-StripeModule/includes/init.inc.php';
```

*Config file is located elsewhere*  
``` php
...
require_once APP . '/modules/TurtlePHP-StripeModule/Stripe.class.php';
\Modules\Stripe::setConfigPath('/path/to/config/file.inc.php');
require_once APP . '/modules/TurtlePHP-StripeModule/includes/init.inc.php';
```

*Config file named `config.inc.php` is being used in the plugin directory*  
``` php
...
require_once APP . '/modules/TurtlePHP-StripeModule/Stripe.class.php';
require_once APP . '/modules/TurtlePHP-StripeModule/includes/init.inc.php';
```
