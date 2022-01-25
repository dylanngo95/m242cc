<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Model\ResourceModel\CustomSalesShipment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use QT\CustomSalesOrder\Model\CustomSalesShipment as Model;
use QT\CustomSalesOrder\Model\ResourceModel\CustomSalesShipment as ResourceModel;

/**
 * Class Collection
 * @package QT\CustomSalesOrder\Model\ResourceModel\CustomSalesShipment
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'custom_sales_shipment_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
