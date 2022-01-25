<?php

namespace QT\OrderStatusApi\Model\Data;

use Magento\Framework\DataObject;
use QT\OrderStatusApi\Api\Data\OrderStatusRequestInterface;

/**
 * Class OrderStatus
 * @package QT\OrderStatusApi\Model\Data
 */
class OrderStatusRequest extends DataObject implements OrderStatusRequestInterface
{
    /**
     * @inheritDoc
     */
    public function getOrderId(): ?int
    {
        return $this->getData(self::ORDER_ID) === null ? null
            : (int)$this->getData(self::ORDER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setOrderId(?int $orderId): void
    {
        $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): ?string
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus(?string $status): void
    {
        $this->setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getState(): ?string
    {
        return $this->getData(self::STATE);
    }

    /**
     * @inheritDoc
     */
    public function setState(?string $state): void
    {
        $this->setData(self::STATE, $state);
    }
}
