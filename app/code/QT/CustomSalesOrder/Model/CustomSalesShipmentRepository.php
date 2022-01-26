<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Model;

use Magento\Framework\Webapi\Exception;
use QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;
use QT\CustomSalesOrder\Api\CustomSalesShipmentRepositoryInterface;
use QT\CustomSalesOrder\Model\CustomSalesShipmentFactory as ObjectModelFactory;
use QT\CustomSalesOrder\Model\ResourceModel\CustomSalesShipment as ObjectResourceModel;

/**
 * Class CustomSalesShipmentRepository
 */
class CustomSalesShipmentRepository implements CustomSalesShipmentRepositoryInterface
{
    /**
     * @var ObjectResourceModel
     */
    private $objectResourceModel;

    /**
     * @var ObjectModelFactory
     */
    private $objectModelFactory;

    /**
     * CustomSalesShipmentRepository constructor.
     * @param ObjectResourceModel $objectResourceModel
     * @param CustomSalesShipmentFactory $objectModelFactory
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
     * @param CustomSalesShipment $customSalesShipment
     * @return CustomSalesShipment
     * @throws Exception
     */
    public function save(
        CustomSalesShipment $customSalesShipment
    ): CustomSalesShipment {
        try {
            $this->objectResourceModel->save($customSalesShipment);
            return $customSalesShipment;
        } catch (\Exception $e) {
            throw new Exception(__($e->getMessage()));
        }
    }

    /**
     * GetById.
     *
     * @param int $id
     * @return CustomSalesShipmentInterface|null
     */
    public function getById(int $id): ?\QT\CustomSalesOrder\Api\CustomSalesShipmentInterface
    {
        $customSalesShipment = $this->objectModelFactory->create();
        $this->objectResourceModel->load($customSalesShipment, $id);
        if (!$customSalesShipment->getEntityId()) {
            return null;
        }
        return $customSalesShipment;
    }

    /**
     * GetByOrderId.
     *
     * @param int $orderId
     * @return CustomSalesShipmentInterface|null
     */
    public function getByOrderId(int $orderId): ?CustomSalesShipmentInterface
    {
        $customSalesShipment = $this->objectResourceModel->getByOrderId($orderId);
        if (!$customSalesShipment->getEntityId()) {
            return null;
        }
        return $customSalesShipment;
    }
}
