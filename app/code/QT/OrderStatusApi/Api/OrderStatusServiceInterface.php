<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Api;

/**
 * Interface OrderStatusServiceInterface
 */
interface OrderStatusServiceInterface
{
    /**
     * Update.
     *
     * @param \QT\OrderStatusApi\Api\Data\OrderStatusRequestInterface[] $orderStatus
     * @return \QT\OrderStatusApi\Api\Data\OrderStatusResponseInterface
     */
    public function update(array $orderStatus): \QT\OrderStatusApi\Api\Data\OrderStatusResponseInterface;

    /**
     * GetList.
     *
     * @return \QT\OrderStatusApi\Api\Data\OrderStatusInterface[]
     */
    public function getList(): array;

    /**
     * GetStateList.
     *
     * @return \QT\OrderStatusApi\Api\Data\OrderStateInterface[]
     */
    public function getStateList(): array;
}
