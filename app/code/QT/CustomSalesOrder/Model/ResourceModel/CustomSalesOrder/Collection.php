<?php

namespace QT\CustomSalesOrder\Model\ResourceModel\CustomSalesOrder;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use QT\CustomSalesOrder\Model\CustomSalesOrder as Model;
use QT\CustomSalesOrder\Model\ResourceModel\CustomSalesOrder as ResourceModel;

/**
 * Class Collection
 * @package QT\CustomSalesOrder\Model\ResourceModel\CustomSalesOrder
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'custom_sales_order_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
