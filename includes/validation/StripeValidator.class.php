<?php

    // namespaces
    namespace Modules\Stripe;

    /**
     * StripeValidator
     * 
     * @author   Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class StripeValidator
    {
        /**
         * isValidToken
         * 
         * @access public
         * @static
         * @param  string $token
         * @return boolean
         */
        public static function isValidToken($token)
        {
            try {
                \Stripe_Token::retrieve($token);
                return true;
            } catch (\Exception $exception) {
                return false;
            }
        }

        /**
         * uniqueEventInputted
         * 
         * Ensures that the event hasn't already been webhook'd by checking if
         * it exists in the database.
         * 
         * @access public
         * @static
         * @return boolean
         */
        public static function uniqueEventInputted()
        {
            $body = file_get_contents('php://input');
            $body = json_decode($body, true);
            \Stripe_Event::retrieve($body['id']);
            $stripeEventModel = \Turtle\Application::getModel(
                '\Modules\Stripe\StripeEvent'
            );
            $stripeEvent = $stripeEventModel->getStripeEventByToken(
                $body['id']
            );
            if ($stripeEvent === false) {
                return true;
            }
            return false;
        }

        /**
         * validEventInputted
         * 
         * Grabs the eventId from the PHP input, and then retrives the event
         * directly from Stripe. If found (valid event; not manufactured), then
         * true is returned;
         * 
         * @access public
         * @static
         * @return boolean
         */
        public static function validEventInputted()
        {
            try {
                $body = file_get_contents('php://input');
                $body = json_decode($body, true);
                \Stripe_Event::retrieve($body['id']);
                return true;
            } catch (\Exception $exception) {
                return false;
            }
        }
    }
