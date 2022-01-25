<?php

namespace QT\OrderStatusApi\Api\Data;

/**
 * Interface OrderStatusRequestInterface
 * @package QT\OrderStatusApi\Api\Data
 */
interface OrderStatusRequestInterface
{
    /**
     * String constants for property names
     */
    const ORDER_ID = "order_id";
    const STATUS = "status";
    const STATE = "state";

    /**
     * Getter for OrderId.
     *
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * Setter for OrderId.
     *
     * @param int|null $orderId
     *
     * @return void
     */
    public function setOrderId(?int $orderId): void;

    /**
     * Getter for Status.
     *
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * Setter for Status.
     *
     * @param string|null $status
     *
     * @return void
     */
    public function setStatus(?string $status): void;

    /**
     * Getter for State.
     *
     * @return string|null
     */
    public function getState(): ?string;

    /**
     * Setter for State.
     *
     * @param string|null $state
     *
     * @return void
     */
    public function setState(?string $state): void;
}
