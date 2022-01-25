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
 * @package QT\CustomSalesOrder\Model
 */
class CustomSalesShipmentRepository implements CustomSalesShipmentRepositoryInterface
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
     * @param CustomSalesShipmentInterface $customSalesShipment
     * @return CustomSalesShipmentInterface
     * @throws Exception
     */
    public function save(
        CustomSalesShipmentInterface $customSalesShipment
    ): CustomSalesShipmentInterface {
        try {
            $this->objectResourceModel->save($customSalesShipment);
            return $customSalesShipment;
        } catch (\Exception $e) {
            throw new Exception(__($e->getMessage()));
        }
    }

    /**
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
     * @param $orderId
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
