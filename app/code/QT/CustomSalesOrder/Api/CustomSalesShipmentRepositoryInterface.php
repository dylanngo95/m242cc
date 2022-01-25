<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Api;

/**
 * Interface CustomSalesShipmentRepositoryInterface
 * @package QT\CustomSalesOrder\Api
 */
interface CustomSalesShipmentRepositoryInterface
{
    /**
     * @param \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface $customSalesShipment
     * @return \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface
     */
    public function save(
        \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface $customSalesShipment
    ): \QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;

    /**
     * @param int $id
     * @return CustomSalesShipmentInterface|null
     */
    public function getById(int $id): ?\QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;

    /**
     * @param int $id
     * @return CustomSalesShipmentInterface|null
     */
    public function getByOrderId(int $id): ?\QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;
}
