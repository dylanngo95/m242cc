<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use QT\CustomSalesOrder\Model\CustomSalesShipmentFactory;

/**
 * Class CustomSalesShipment
 * @package QT\CustomSalesOrder\Model\ResourceModel
 */
class CustomSalesShipment extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'custom_sales_shipment_resource_model';

    /**
     * @var CustomSalesShipmentFactory
     */
    private CustomSalesShipmentFactory $customSalesShipmentFactory;

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('custom_sales_shipment', 'entity_id');
        $this->_useIsObjectNew = true;
    }

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        $connectionName = null,
        CustomSalesShipmentFactory $customSalesShipmentFactory
    ) {
        parent::__construct($context, $connectionName);
        $this->customSalesShipmentFactory = $customSalesShipmentFactory;
    }
    /**
     * Get By Order Id.
     *
     * @param int $orderId
     * @return \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface
     */
    public function getByOrderId(int $orderId): \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface
    {
        $customSalesOrder = $this->customSalesShipmentFactory->create();

        $connection = $this->getConnection();
        $select = $connection
            ->select()
            ->from($connection->getTableName('custom_sales_shipment'));
        $select->where('order_id=?', $orderId);
        $data = $connection->fetchRow($select);
        if ($data) {
            $customSalesOrder->setData($data);
        }
        return $customSalesOrder;
    }
}
