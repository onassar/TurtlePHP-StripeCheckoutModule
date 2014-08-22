<?php

    // namespaces
    namespace Modules\Stripe;

    // dependencies
    require_once MODULE . '/accessors/Accessor.class.php';

    /**
     * PlanAccessor
     *
     * @extends Accessor
     */
    class PlanAccessor extends Accessor
    {
        /**
         * _modelName
         * 
         * @var    string (default: 'Plan')
         * @access protected
         */
        protected $_modelName = 'Plan';

        /**
         * _recordType
         * 
         * @var    string (default: 'plan')
         * @access protected
         */
        protected $_recordType = 'plan';

        /**
         * _tableName
         * 
         * @var    string (default: 'plans')
         * @access protected
         */
        protected $_tableName = 'plans';

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
