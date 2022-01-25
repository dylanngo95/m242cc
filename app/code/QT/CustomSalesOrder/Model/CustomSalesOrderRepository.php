<?php

namespace QT\CustomSalesOrder\Model;

use Magento\Framework\Webapi\Exception;
use QT\CustomSalesOrder\Api\CustomSalesOrderInterface;
use QT\CustomSalesOrder\Api\CustomSalesOrderRepositoryInterface;
use QT\CustomSalesOrder\Model\ResourceModel\CustomSalesOrder as ObjectResourceModel;
use QT\CustomSalesOrder\Model\CustomSalesOrderFactory as ObjectModelFactory;

/**
 * Class CustomSalesOrderRepository
 * @package QT\CustomSalesOrder\Model
 */
class CustomSalesOrderRepository implements CustomSalesOrderRepositoryInterface
{
    /**
     * @var ObjectResourceModel
     */
    private $objectResourceModel;

    /**
     * @var CustomSalesOrderFactory
     */
    private $objectModelFactory;

    public function __construct(
        ObjectResourceModel $objectResourceModel,
        ObjectModelFactory $objectModelFactory
    ) {
        $this->objectResourceModel = $objectResourceModel;
        $this->objectModelFactory = $objectModelFactory;
    }

    /**
     * @param CustomSalesOrderInterface $customSalesOrder
     * @return CustomSalesOrderInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @throws Exception
     */
    public function save(CustomSalesOrderInterface $customSalesOrder)
    {
        try {
            $this->objectResourceModel->save($customSalesOrder);
            return $customSalesOrder;
        } catch (\Exception $e) {
            throw new Exception(__($e->getMessage()));
        }
    }

    /**
     * @param $id
     * @return CustomSalesOrderInterface|null
     */
    public function getById($id)
    {
        $customSalesOrder = $this->objectModelFactory->create();
        $this->objectResourceModel->load($customSalesOrder, $id);
        if (!$customSalesOrder->getEntityId()) {
            return null;
        }
        return $customSalesOrder;
    }

    /**
     * @param int $orderId
     * @return CustomSalesOrderInterface|null
     */
    public function getByOrderId(int $orderId)
    {
        $customSalesOrder = $this->objectResourceModel->getByOrderId($orderId);
        if (!$customSalesOrder->getEntityId()) {
            return null;
        }
        return $customSalesOrder;
    }
}
