<?php

    // namespaces
    namespace Modules\Stripe;

    /**
     * Webhooks
     * 
     * @extends \StripeWebhooksController
     * @final
     */
    final class WebhooksController extends \StripeWebhooksController
    {
        /**
         * __callParent
         * 
         * @access private
         * @param  string $name
         * @param  boolean $passed
         * @param  array $args (default: array)
         * @return void
         */
        private function __callParent($name, $passed, array $args = array())
        {
            $parent = array('parent', $name);
            if (is_callable($parent)) {
                define('PASSED', $passed);
                call_user_func_array($parent, $args);
            }
        }

        /**
         * actionIndex
         * 
         * @access public
         * @return void
         */
        public function actionIndex()
        {
            /**
             * Validation
             * 
             */

            // // validate
            $schema = (new \SmartSchema(
                APP . '/schemas/stripeWebhooks.index.post.json',
                true
            ));
            $validator = (new \ProjectSchemaValidator(
                $schema,
                $this->getRequest()
            ));
            if ($validator->valid() === false) {

                // Failed response
                $response = array(
                    'success' => false,
                    'failedRules' => $validator->getFailedRules(false)
                );
                $this->_pass('response', json_encode($response));

                // Parent
                $args = func_get_args();
                $this->__callParent(__FUNCTION__, false, $args);
            } else {

                // Posted body
                $body = file_get_contents('php://input');
                $body = json_decode($body, true);
                $event = \Stripe_Event::retrieve($body['id']);

                // Track event
                $stripeEventModel = $this->_getModel('StripeEvent');
                $stripeEvent = $stripeEventModel->createStripeEvent(array(
                    'type' => $event->type,
                    'token' => $body['id']
                ));

                // Respond (to ensure a 200 for Stripe)
                $response = array(
                    'success' => true,
                    'data' => $stripeEvent->getPublicData()
                );
                $this->_pass('response', json_encode($response));

                // Parent
                $args = func_get_args();
                $this->__callParent(__FUNCTION__, true, $args);

                // // Invoice payment
                // if ($event->type === 'invoice.payment_succeeded') {

                //     // Process event
                //     $this->_invoicePaymentSucceeded($event);
                // }
                // // Invoice failed
                // elseif ($event->type === 'invoice.payment_failed') {

                //     // Process event
                //     $this->_invoicePaymentFailed($event);
                // }
            }
        }
    }
