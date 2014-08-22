<?php

    // namespaces
    namespace Modules\Stripe;

    // dependencies
    require_once MODULE . '/models/App.class.php';
    require_once MODULE . '/accessors/Plan.class.php';

    /**
     * PlanModel
     *
     * @extends AppModel
     */
    class PlanModel extends AppModel
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
         * createPlan
         *
         * @access public
         * @param  array $details
         * @return PlanAccessor
         */
        public function createPlan(array $details)
        {
            return $this->_createRecord($details);
        }

        /**
         * getPlanById
         *
         * @access public
         * @param  integer $id
         * @return PlanAccessor
         */
        public function getPlanById($id)
        {
            return $this->_getAccessorById($id);
        }
    }
