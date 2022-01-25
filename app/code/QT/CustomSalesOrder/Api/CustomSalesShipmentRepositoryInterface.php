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
     * @param \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface $customSalesShipment
     * @return \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface
     */
    public function save(
        \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface $customSalesShipment
    ): \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;

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
