<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Api\Data;

/**
 * Interface OrderStatusResponseInterface
 * @package QT\OrderStatusApi\Api\Data
 */
interface OrderStatusResponseInterface
{
    /**
     * String constants for property names
     */
    const ORDER_ID_UPDATE_SUCCESS = "order_id_update_success";
    const ORDER_ID_UPDATE_ERROR = "order_id_update_error";

    /**
     * Getter for OrderIdUpdateSuccess.
     *
     * @return array|null
     */
    public function getOrderIdUpdateSuccess(): ?array;

    /**
     * Setter for OrderIdUpdateSuccess.
     *
     * @param array|null $orderIdUpdateSuccess
     *
     * @return void
     */
    public function setOrderIdUpdateSuccess(?array $orderIdUpdateSuccess): void;

    /**
     * Getter for OrderIdUpdateError.
     *
     * @return array|null
     */
    public function getOrderIdUpdateError(): ?array;

    /**
     * Setter for OrderIdUpdateError.
     *
     * @param array|null $orderIdUpdateError
     *
     * @return void
     */
    public function setOrderIdUpdateError(?array $orderIdUpdateError): void;
}
