<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Api;


/**
 * Interface CustomSalesOrderRepositoryInterface
 * @package QT\CustomSalesOrder\Api
 */
interface CustomSalesOrderRepositoryInterface
{
    /**
     * @param \QT\CustomSalesOrder\Api\CustomSalesOrderInterface $customSalesOrder
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface
     */
    public function save(CustomSalesOrderInterface $customSalesOrder);

    /**
     * @param int $id
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface|null
     */
    public function getById($id);

    /**
     * @param int $orderId
     * @return \QT\CustomSalesOrder\Api\CustomSalesOrderInterface|null
     */
    public function getByOrderId(int $orderId);

}
