<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model\ResourceModel\OrderStatus;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use QT\OrderStatusApi\Model\OrderStatus as Model;
use QT\OrderStatusApi\Model\ResourceModel\OrderStatus as ResourceModel;

/**
 * Class Collection
 * @package QT\OrderStatusApi\Model\ResourceModel\OrderStatus
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'sales_order_status_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
