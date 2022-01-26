<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;
use QT\CustomSalesOrder\Model\CustomSalesShipmentFactory;

/**
 * Class CustomSalesShipment
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
    private $customSalesShipmentFactory;

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('custom_sales_shipment', 'entity_id');
        $this->_useIsObjectNew = true;
    }

    /**
     * CustomSalesShipment constructor.
     * @param Context $context
     * @param string|null $connectionName
     * @param CustomSalesShipmentFactory $customSalesShipmentFactory
     */
    public function __construct(
        Context $context,
        string $connectionName = null,
        CustomSalesShipmentFactory $customSalesShipmentFactory
    ) {
        parent::__construct($context, $connectionName);
        $this->customSalesShipmentFactory = $customSalesShipmentFactory;
    }
    /**
     * Get By Order Id.
     *
     * @param int $orderId
     * @return CustomSalesShipmentInterface
     */
    public function getByOrderId(int $orderId): CustomSalesShipmentInterface
    {
        $customSalesOrder = $this->customSalesShipmentFactory->create();

        /** @var \Magento\Framework\DB\Adapter\AdapterInterface $connection */
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
