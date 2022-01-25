<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model\Data;

use Magento\Framework\DataObject;
use QT\OrderStatusApi\Api\Data\OrderStatusResponseInterface;

/**
 * Class OrderStatusResponse
 * @package QT\OrderStatusApi\Model\Data
 */
class OrderStatusResponse extends DataObject implements OrderStatusResponseInterface
{
    /**
     * @inheritDoc
     */
    public function getOrderIdUpdateSuccess(): ?array
    {
        return $this->getData(self::ORDER_ID_UPDATE_SUCCESS) ?? $this->getData(self::ORDER_ID_UPDATE_SUCCESS);
    }

    /**
     * @inheritDoc
     */
    public function setOrderIdUpdateSuccess(?array $orderIdUpdateSuccess): void
    {
        $this->setData(self::ORDER_ID_UPDATE_SUCCESS, $orderIdUpdateSuccess);
    }

    /**
     * @inheritDoc
     */
    public function getOrderIdUpdateError(): ?array
    {
        return $this->getData(self::ORDER_ID_UPDATE_ERROR) ?? $this->getData(self::ORDER_ID_UPDATE_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function setOrderIdUpdateError(?array $orderIdUpdateError): void
    {
        $this->setData(self::ORDER_ID_UPDATE_ERROR, $orderIdUpdateError);
    }
}
