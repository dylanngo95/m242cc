<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model\ResourceModel\OrderState;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use QT\OrderStatusApi\Model\OrderState as Model;
use QT\OrderStatusApi\Model\ResourceModel\OrderState as ResourceModel;

/**
 * Class Collection
 * @package QT\OrderStatusApi\Model\ResourceModel\OrderState
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'sales_order_status_state_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
