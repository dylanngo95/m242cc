<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Model;

use Magento\Framework\Model\AbstractModel;
use QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;
use QT\CustomSalesOrder\Model\ResourceModel\CustomSalesShipment as ResourceModel;

/**
 * Class CustomSalesShipment
 * @package QT\CustomSalesOrder\Model
 */
class CustomSalesShipment extends AbstractModel implements CustomSalesShipmentInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'custom_sales_shipment_model';

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
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entity)
    {
        $this->setData(self::ENTITY_ID, $entity);
    }

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
    public function getContractId(): ?string
    {
        return $this->getData(self::CONTRACT_ID);
    }

    /**
     * @inheritDoc
     */
    public function setContractId(?string $contractId): void
    {
        $this->setData(self::CONTRACT_ID, $contractId);
    }

    /**
     * @inheritDoc
     */
    public function getCity(): ?string
    {
        return $this->getData(self::CITY);
    }

    /**
     * @inheritDoc
     */
    public function setCity(?string $city): void
    {
        $this->setData(self::CITY, $city);
    }

    /**
     * @inheritDoc
     */
    public function getDistrict(): ?string
    {
        return $this->getData(self::DISTRICT);
    }

    /**
     * @inheritDoc
     */
    public function setDistrict(?string $district): void
    {
        $this->setData(self::DISTRICT, $district);
    }

    /**
     * @inheritDoc
     */
    public function getStreet(): ?string
    {
        return $this->getData(self::STREET);
    }

    /**
     * @inheritDoc
     */
    public function setStreet(?string $street): void
    {
        $this->setData(self::STREET, $street);
    }

    /**
     * @inheritDoc
     */
    public function getCarrierCode(): ?string
    {
        return $this->getData(self::CARRIER_CODE);
    }

    /**
     * @inheritDoc
     */
    public function setCarrierCode(?string $carrierCode): void
    {
        $this->setData(self::CARRIER_CODE, $carrierCode);
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryStatus(): ?string
    {
        return $this->getData(self::DELIVERY_STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setDeliveryStatus(?string $status): void
    {
        $this->setData(self::DELIVERY_STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getConfirmedAt(): ?string
    {
        return $this->getData(self::CONFIRMED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setConfirmedAt(?string $confirmedAt): void
    {
        $this->setData(self::CONFIRMED_AT, $confirmedAt);
    }

    /**
     * @inheritDoc
     */
    public function getPackedAt(): ?string
    {
        return $this->getData(self::PACKED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setPackedAt(?string $packedAt): void
    {
        $this->setData(self::PACKED_AT, $packedAt);
    }

    /**
     * @inheritDoc
     */
    public function getSendHvcAt(): ?string
    {
        return $this->getData(self::SEND_HVC_AT);
    }

    /**
     * @inheritDoc
     */
    public function setSendHvcAt(?string $sendHvcAt): void
    {
        $this->setData(self::SEND_HVC_AT, $sendHvcAt);
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryAt(): ?string
    {
        return $this->getData(self::DELIVERY_AT);
    }

    /**
     * @inheritDoc
     */
    public function setDeliveryAt(?string $deliveryAt): void
    {
        $this->setData(self::DELIVERY_AT, $deliveryAt);
    }
}
