<?php

    // modules namespace
    namespace Modules;

    /**
     * Stripe
     * 
     * @author   Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class Stripe
    {
        /**
         * _configPath
         *
         * @var    string
         * @access protected
         * @static
         */
        protected static $_configPath = 'config.default.inc.php';

        /**
         * _getPlanDetails
         * 
         * @access protected
         * @param  UserAccessor $user
         * @return array
         */
        protected function _getPlanDetails(UserAccessor $user)
        {
            // Interval
            $interval = 'year';
            if ($user->frequency === 'monthly') {
                $interval = 'month';
            }

            // Rate
            $rate = $user->rate;
            if ($user->frequency === 'yearly') {
                $rate = $user->yearlyRate;
            }

            // Details
            return array(
              'amount' => $rate,
              'interval' => $interval,
              'name' => 'Pro',
              'currency' => getConfig('currency'),
              'id' => $this->_getPlanId($user),
              'trial_period_days' => $user->numberOfFreeTrialDays
            );
        }

        /**
         * _getPlanId
         * 
         * @example Name:Pro-Rate:500-Currency:CAD-Interval:Monthly-TrialDays:0
         * @access  protected
         * @param   UserAccessor $user
         * @return  string
         */
        protected function _getPlanId(UserAccessor $user)
        {
            // Reqs
            $config = getConfig();

            // Rate
            $rate = $user->rate;
            if ($user->frequency === 'yearly') {
                $rate = $user->yearlyRate;
            }

            // Let's do this!
            $id = 'Name:Pro-';
            $id .= 'Rate:' . ($rate) . '-';
            $id .= 'Currency:' . strtoupper($config['stripe']['currency']) . '-';
            $id .= 'Interval:' . ucfirst($user->frequency) . '-';
            $id .= 'TrialDays:' . ($user->numberOfFreeTrialDays);
            return $id;
        }

        /**
         * createRecords
         * 
         * @access public
         * @static
         * @param  \UserAccessor $user
         * @return Stripe_Customer
         */
        public static function createRecords(\UserAccessor $user)
        {
            /**
             * Customer
             * 
             */

            // Customer record
            if ($user->stripeCustomerId === '') {
                try {
                    $customer = \Stripe_Customer::create(array(
                        'email' => $user->email
                    ));
                } catch (\Exception $exception) {
                    el('Exception while creating customer');
                    throw($exception);
                }
            } else {
                $customer = \Stripe_Customer::retrieve(
                    $user->stripeCustomerId
                );
            }

            /**
             * Card
             * 
             */

            // Add to customer
            try {
                $card = $customer->cards->create(array(
                    'card' => $_POST['stripeToken']
                ));
            } catch (\Exception $exception) {
                el('Exception while adding card');
                try {
                    $customer->delete();
                } catch (\Exception $secondary) {
                    el('Exception while cleaning upgrade');
                }
                throw($exception);
            }

            // Set as default
            try {
                $customer->default_card = $card->id;
                $customer->save();
            } catch (\Exception $exception) {
                el('Exception while saving default card');
                try {
                    $card->delete();
                    $customer->delete();
                } catch (\Exception $secondary) {
                    el('Exception while cleaning upgrade');
                }
                throw($exception);
            }

            /**
             * Taxes
             * 
             */

            // Invoice item record
            if (true) {
                $region = $province;
                if (getConfig('applyTaxes') === true) {
                    try {
                        $description = ($region->name) . ' ' .
                            ($region->taxName) . ' (' . ($region->taxRate) .
                            '%)';
                        $invoiceItem = \Stripe_InvoiceItem::create(array(
                            'customer' => $customer->id,
                            'amount' => round(
                                ($plan->amount / 100) * ($region->taxRate)
                            ),
                            'currency' => getConfig('currency'),
                            'description' => $description
                        ));
                    } catch (\Exception $exception) {
                        el('Exception while creating invoice item');
                        try {
                            $card->delete();
                            $customer->delete();
                        } catch (\Exception $secondary) {
                            el('Exception while cleaning upgrade');
                        }
                        throw($exception);
                    }
                }
            }

            /**
             * Plan
             * 
             */

            // Plan record
            $planDetails = $this->_getPlanDetails($user);
            try {
                $plan = \Stripe_Plan::retrieve($planDetails['id']);
            } catch (\Exception $exception) {
                try {
                    $planDetails = $this->_getPlanDetails($user);
                    $plan = \Stripe_Plan::create($planDetails);
                } catch (\Exception $exception) {
                    el('Exception while creating plan');
                    try {
                        if (isset($invoiceItem)) {
                            $invoiceItem->delete();
                        }
                        $card->delete();
                        $customer->delete();
                    } catch (\Exception $secondary) {
                        el('Exception while cleaning upgrade');
                    }
                    throw($exception);
                }
            }
er(pr($plan, true));
            /**
             * Subscription
             * 
             */

            // Subscription record
            try {
                $customer->updateSubscription(array(
                    'plan' => $plan->id
                ));
            } catch (\Exception $exception) {
                el('Exception while updating subscription');
                try {
                    if (isset($invoiceItem)) {
                        $invoiceItem->delete();
                    }
                    $card->delete();
                    $customer->delete();
                } catch (\Exception $secondary) {
                    el('Exception while cleaning upgrade');
                }
                throw($exception);
            }

            // Done
            return $customer;
        }

        /**
         * getConfig
         * 
         * @access public
         * @static
         * @return array
         */
        public static function getConfig()
        {
            $args = func_get_args();
            array_unshift($args, 'TurtlePHP-StripeModule');
            return call_user_func_array(
                array('\Plugin\Config', 'retrieve'),
                $args
            );
        }

        /**
         * getConfigPath
         * 
         * @access public
         * @return string
         */
        public static function getConfigPath()
        {
            return self::$_configPath;
        }

        /**
         * setConfigPath
         * 
         * @access public
         * @param  string $path
         * @return void
         */
        public static function setConfigPath($path)
        {
            self::$_configPath = $path;
        }
    }

    // non-default config file check
    $info = pathinfo(__DIR__);
    $parent = ($info['dirname']) . '/' . ($info['basename']);
    $configPath = $parent . '/includes/config.inc.php';
    if (is_file($configPath)) {
        Stripe::setConfigPath($configPath);
    }
