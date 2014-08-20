<?php

    // namespaces
    namespace Modules\Stripe;

    // dependencies
    require_once MODULE . '/models/App.class.php';
    require_once MODULE . '/accessors/StripeEvent.class.php';

    /**
     * StripeEventModel
     *
     * @extends AppModel
     */
    class StripeEventModel extends AppModel
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
         * createStripeEvent
         *
         * @access public
         * @param  array $details
         * @return StripeEventAccessor
         */
        public function createStripeEvent(array $details)
        {
            return $this->_createRecord($details);
        }

        /**
         * getStripeEventById
         *
         * @access public
         * @param  integer $id
         * @return StripeEventAccessor
         */
        public function getStripeEventById($id)
        {
            return $this->_getAccessorById($id);
        }

        /**
         * getStripeEventByToken
         *
         * @access public
         * @param  string $token
         * @return StripeEventAccessor|false
         */
        public function getStripeEventByToken($token)
        {
            // Query
            $query = (new Query());
            $query->select('id');
            $query->from('stripeEvents');
            $query->where('status', 'open');
            $query->andWhere('token', mysql_real_escape_string($token));

            // Retrieve matching records
            $mySQLQuery = (new MySQLQuery($query->parse()));
            $records = $mySQLQuery->getResults();

            // Not found
            if (empty($records)) {
                return false;
            }

            // Return accessor
            return $this->getStripeEventById($records[0]['id']);
        }
    }
