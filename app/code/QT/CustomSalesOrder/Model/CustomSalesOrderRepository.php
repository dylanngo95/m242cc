<?php

namespace QT\CustomSalesOrder\Model;

use Magento\Framework\Webapi\Exception;
use QT\CustomSalesOrder\Api\CustomSalesOrderInterface;
use QT\CustomSalesOrder\Api\CustomSalesOrderRepositoryInterface;
use QT\CustomSalesOrder\Model\ResourceModel\CustomSalesOrder as ObjectResourceModel;
use QT\CustomSalesOrder\Model\CustomSalesOrderFactory as ObjectModelFactory;

/**
 * Class CustomSalesOrderRepository
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

    /**
     * CustomSalesOrderRepository constructor.
     * @param ObjectResourceModel $objectResourceModel
     * @param CustomSalesOrderFactory $objectModelFactory
     */
    public function __construct(
        ObjectResourceModel $objectResourceModel,
        ObjectModelFactory $objectModelFactory
    ) {
        $this->objectResourceModel = $objectResourceModel;
        $this->objectModelFactory = $objectModelFactory;
    }

    /**
     * Save.
     *
     * @param CustomSalesOrderInterface $customSalesOrder
     * @return CustomSalesOrderInterface
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
     * GetById.
     *
     * @param int $id
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
     * GetByOrderId.
     *
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
