<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Api;

/**
 * Interface CustomSalesShipmentRepositoryInterface
 */
interface CustomSalesShipmentRepositoryInterface
{
    /**
     * Save.
     *
     * @param \QT\CustomSalesOrder\Model\CustomSalesShipment $customSalesShipment
     * @return \QT\CustomSalesOrder\Model\CustomSalesShipment
     */
    public function save(
        \QT\CustomSalesOrder\Model\CustomSalesShipment $customSalesShipment
    ): \QT\CustomSalesOrder\Model\CustomSalesShipment;

    /**
     * GetById.
     *
     * @param int $id
     * @return CustomSalesShipmentInterface|null
     */
    public function getById(int $id): ?\QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;

    /**
     * GetByOrderId.
     *
     * @param int $id
     * @return CustomSalesShipmentInterface|null
     */
    public function getByOrderId(int $id): ?\QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;
}
