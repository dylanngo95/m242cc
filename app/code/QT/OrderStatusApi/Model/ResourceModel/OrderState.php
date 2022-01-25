<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class OrderState
 * @package QT\OrderStatusApi\Model\ResourceModel
 */
class OrderState extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'sales_order_status_state_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('sales_order_status_state', 'status,state');
        $this->_useIsObjectNew = true;
    }
}
