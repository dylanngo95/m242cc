<?php

namespace QT\CustomSalesOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use QT\CustomSalesOrder\Model\CustomSalesOrderFactory;

/**
 * Class CustomSalesOrder
 * @package QT\CustomSalesOrder\Model\ResourceModel
 */
class CustomSalesOrder extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'custom_sales_order_resource_model';

    /**
     * @var CustomSalesOrderFactory
     */
    private $customSalesOrderFactory;

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('custom_sales_order', 'entity_id');
    }

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        $connectionName = null,
        CustomSalesOrderFactory $customSalesOrderFactory
    ) {
        parent::__construct($context, $connectionName);
        $this->customSalesOrderFactory = $customSalesOrderFactory;
    }

    /**
     * Get By Order Id.
     *
     * @param $orderId
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface
     */
    public function getByOrderId($orderId)
    {
        $customSalesOrder = $this->customSalesOrderFactory->create();

        $connection = $this->getConnection();
        $select = $connection
            ->select()
            ->from($connection->getTableName('custom_sales_order'));
        $select->where('order_id=?', $orderId);
        $data = $connection->fetchRow($select);
        if ($data) {
            $customSalesOrder->setData($data);
        }
        return $customSalesOrder;
    }
}
