<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model;

use Magento\Framework\Model\AbstractModel;
use QT\OrderStatusApi\Api\Data\OrderStatusInterface;
use QT\OrderStatusApi\Model\ResourceModel\OrderStatus as ResourceModel;

/**
 * Class OrderStatus
 * @package QT\OrderStatusApi\Model
 */
class OrderStatus extends AbstractModel implements OrderStatusInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'sales_order_status_model';

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
    public function getLabel(): ?string
    {
        return $this->getData(self::LABEL);
    }

    /**
     * @inheritDoc
     */
    public function setLabel(?string $label): void
    {
        $this->setData(self::LABEL, $label);
    }
}
