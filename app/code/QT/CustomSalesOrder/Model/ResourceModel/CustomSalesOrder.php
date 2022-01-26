<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use QT\CustomSalesOrder\Model\CustomSalesOrderFactory;

/**
 * Class CustomSalesOrder
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

    /**
     * Constructor
     *
     * @param Context $context
     * @param string|null $connectionName
     * @param CustomSalesOrderFactory $customSalesOrderFactory
     */
    public function __construct(
        Context $context,
        string $connectionName = null,
        CustomSalesOrderFactory $customSalesOrderFactory
    ) {
        parent::__construct($context, $connectionName);
        $this->customSalesOrderFactory = $customSalesOrderFactory;
    }

    /**
     * Get By Order Id.
     *
     * @param int $orderId
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface
     */
    public function getByOrderId($orderId)
    {
        $customSalesOrder = $this->customSalesOrderFactory->create();

        /** @var \Magento\Framework\DB\Adapter\AdapterInterface $connection */
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
