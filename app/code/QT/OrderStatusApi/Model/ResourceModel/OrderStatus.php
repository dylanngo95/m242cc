<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class OrderStatus
 * @package QT\OrderStatusApi\Model\ResourceModel
 */
class OrderStatus extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'sales_order_status_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('sales_order_status', 'status');
        $this->_useIsObjectNew = true;
    }
}
