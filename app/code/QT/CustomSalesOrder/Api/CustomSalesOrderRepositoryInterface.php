<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Api;

use QT\CustomSalesOrder\Model\CustomSalesOrder;

/**
 * Interface CustomSalesOrderRepositoryInterface
 */
interface CustomSalesOrderRepositoryInterface
{
    /**
     * Save.
     *
     * @param CustomSalesOrder $customSalesOrder
     * @return CustomSalesOrder
     */
    public function save(CustomSalesOrder $customSalesOrder);

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
