<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model;

use Magento\Framework\Model\AbstractModel;
use QT\OrderStatusApi\Api\Data\OrderStateInterface;
use QT\OrderStatusApi\Model\ResourceModel\OrderState as ResourceModel;

/**
 * Class OrderState
 * @package QT\OrderStatusApi\Model
 */
class OrderState extends AbstractModel implements OrderStateInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'sales_order_status_state_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
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

    /**
     * @inheritDoc
     */
    public function getIsDefault(): ?int
    {
        return $this->getData(self::IS_DEFAULT) === null ? null
            : (int)$this->getData(self::IS_DEFAULT);
    }

    /**
     * @inheritDoc
     */
    public function setIsDefault(?int $isDefault): void
    {
        $this->setData(self::IS_DEFAULT, $isDefault);
    }

    /**
     * @inheritDoc
     */
    public function getVisibleOnFront(): ?int
    {
        return $this->getData(self::VISIBLE_ON_FRONT) === null ? null
            : (int)$this->getData(self::VISIBLE_ON_FRONT);
    }

    /**
     * @inheritDoc
     */
    public function setVisibleOnFront(?int $visibleOnFront): void
    {
        $this->setData(self::VISIBLE_ON_FRONT, $visibleOnFront);
    }
}
