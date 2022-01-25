<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Api;

/**
 * Interface CustomSalesOrderRepositoryInterface
 */
interface CustomSalesOrderRepositoryInterface
{
    /**
     * Save.
     *
     * @param \QT\CustomSalesOrder\Api\CustomSalesOrderInterface $customSalesOrder
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface
     */
    public function save(CustomSalesOrderInterface $customSalesOrder);

    /**
     * GetById.
     *
     * @param int $id
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface|null
     */
    public function getById($id);

    /**
     * GetByOrderId.
     *
     * @param int $orderId
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface|null
     */
    public function getByOrderId(int $orderId);
}
