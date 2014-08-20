<?php

    // namespaces
    namespace Modules\Stripe;

    // dependencies
    require_once MODULE . '/accessors/Accessor.class.php';

    /**
     * StripeEventAccessor
     *
     * @extends Accessor
     */
    class StripeEventAccessor extends Accessor
    {
        /**
         * _modelName
         * 
         * @var    string (default: 'StripeEvent')
         * @access protected
         */
        protected $_modelName = 'StripeEvent';

        /**
         * _recordType
         * 
         * @var    string (default: 'stripeEvent')
         * @access protected
         */
        protected $_recordType = 'stripeEvent';

        /**
         * _tableName
         * 
         * @var    string (default: 'stripeEvents')
         * @access protected
         */
        protected $_tableName = 'stripeEvents';

        /**
         * getPublicData
         *
         * @access public
         * @return array
         */
        public function getPublicData()
        {
            $this->status;// Needed to ensure data is retrieved from store
            $data = $this->_data;
            return $data;
        }
    }
