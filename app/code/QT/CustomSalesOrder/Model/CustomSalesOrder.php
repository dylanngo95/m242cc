<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Model;

use Magento\Framework\Model\AbstractModel;
use QT\CustomSalesOrder\Api\CustomSalesOrderInterface;
use QT\CustomSalesOrder\Model\ResourceModel\CustomSalesOrder as ResourceModel;

/**
 * Class CustomSalesOrder
 * @package QT\CustomSalesOrder\Model
 */
class CustomSalesOrder extends AbstractModel implements CustomSalesOrderInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'custom_sales_order_model';

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
        return $this->getData(self::ENTITY_ID) === null ? null
            : (int)$this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entityId)
    {
        $this->setData(self::ENTITY_ID, $entityId);
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
    public function getIntegrationId(): ?int
    {
        return $this->getData(self::INTEGRATION_ID) === null ? null
            : (int)$this->getData(self::INTEGRATION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setIntegrationId(?int $integrationId): void
    {
        $this->setData(self::INTEGRATION_ID, $integrationId);
    }

    /**
     * @inheritDoc
     */
    public function getSalesChannel(): ?string
    {
        return $this->getData(self::SALES_CHANNEL);
    }

    /**
     * @inheritDoc
     */
    public function setSalesChannel(?string $salesChannel): void
    {
        $this->setData(self::SALES_CHANNEL, $salesChannel);
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryNoteId(): ?string
    {
        return $this->getData(self::DELIVERY_NOTE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setDeliveryNoteId(?string $deliveryNoteId): void
    {
        $this->setData(self::DELIVERY_NOTE_ID, $deliveryNoteId);
    }

    /**
     * @inheritDoc
     */
    public function getSpecification(): ?string
    {
        return $this->getData(self::SPECIFICATION);
    }

    /**
     * @inheritDoc
     */
    public function setSpecification(?string $specification): void
    {
        $this->setData(self::SPECIFICATION, $specification);
    }

    /**
     * @inheritDoc
     */
    public function getCreator(): ?string
    {
        return $this->getData(self::CREATOR);
    }

    /**
     * @inheritDoc
     */
    public function setCreator(?string $creator): void
    {
        $this->setData(self::CREATOR, $creator);
    }

    /**
     * @inheritDoc
     */
    public function getCsPerson(): ?string
    {
        return $this->getData(self::CS_PERSON);
    }

    /**
     * @inheritDoc
     */
    public function setCsPerson(?string $csPerson): void
    {
        $this->setData(self::CS_PERSON, $csPerson);
    }

    /**
     * @inheritDoc
     */
    public function getIssuer(): ?string
    {
        return $this->getData(self::ISSUER);
    }

    /**
     * @inheritDoc
     */
    public function setIssuer(?string $issuer): void
    {
        $this->setData(self::ISSUER, $issuer);
    }

    /**
     * @inheritDoc
     */
    public function getSalePerson(): ?string
    {
        return $this->getData(self::SALE_PERSON);
    }

    /**
     * @inheritDoc
     */
    public function setSalePerson(?string $salePerson): void
    {
        $this->setData(self::SALE_PERSON, $salePerson);
    }

    /**
     * @inheritDoc
     */
    public function getProducts(): ?string
    {
        return $this->getData(self::PRODUCTS);
    }

    /**
     * @inheritDoc
     */
    public function setProducts(?string $products): void
    {
        $this->setData(self::PRODUCTS, $products);
    }

    /**
     * @inheritDoc
     */
    public function getCsComment(): ?string
    {
        return $this->getData(self::CS_COMMENT);
    }

    /**
     * @inheritDoc
     */
    public function setCsComment(?string $csComment): void
    {
        $this->setData(self::CS_COMMENT, $csComment);
    }

    /**
     * @inheritDoc
     */
    public function getSupplier(): ?string
    {
        return $this->getData(self::SUPPLIER);
    }

    /**
     * @inheritDoc
     */
    public function setSupplier(?string $supplier): void
    {
        $this->setData(self::SUPPLIER, $supplier);
    }

    /**
     * @inheritDoc
     */
    public function getCancelReason(): ?string
    {
        return $this->getData(self::CANCEL_REASON);
    }

    /**
     * @inheritDoc
     */
    public function setCancelReason(?string $cancelReason): void
    {
        $this->setData(self::CANCEL_REASON, $cancelReason);
    }

    /**
     * @inheritDoc
     */
    public function getUseD(): ?string
    {
        return $this->getData(self::USE_D);
    }

    /**
     * @inheritDoc
     */
    public function setUseD(?string $useD): void
    {
        $this->setData(self::USE_D, $useD);
    }

    /**
     * @inheritDoc
     */
    public function getReconcileStatus(): ?string
    {
        return $this->getData(self::RECONCILE_STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setReconcileStatus(?string $reconcileStatus): void
    {
        $this->setData(self::RECONCILE_STATUS, $reconcileStatus);
    }

    /**
     * @inheritDoc
     */
    public function getTransferStatus(): ?string
    {
        return $this->getData(self::TRANSFER_STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setTransferStatus(?string $transferStatus): void
    {
        $this->setData(self::TRANSFER_STATUS, $transferStatus);
    }

    /**
     * @inheritDoc
     */
    public function getTotalAdvance(): ?float
    {
        return $this->getData(self::TOTAL_ADVANCE) === null ? null
            : (float)$this->getData(self::TOTAL_ADVANCE);
    }

    /**
     * @inheritDoc
     */
    public function setTotalAdvance(?float $totalAdvance): void
    {
        $this->setData(self::TOTAL_ADVANCE, $totalAdvance);
    }

    /**
     * @inheritDoc
     */
    public function getTransferDate(): ?string
    {
        return $this->getData(self::TRANSFER_DATE);
    }

    /**
     * @inheritDoc
     */
    public function setTransferDate(?string $transferDate): void
    {
        $this->setData(self::TRANSFER_DATE, $transferDate);
    }

    /**
     * @inheritDoc
     */
    public function getShippingDiscount(): ?float
    {
        return $this->getData(self::SHIPPING_DISCOUNT) === null ? null
            : (float)$this->getData(self::SHIPPING_DISCOUNT);
    }

    /**
     * @inheritDoc
     */
    public function setShippingDiscount(?float $shippingDiscount): void
    {
        $this->setData(self::SHIPPING_DISCOUNT, $shippingDiscount);
    }

    /**
     * @inheritDoc
     */
    public function getCategory(): ?string
    {
        return $this->getData(self::CATEGORY);
    }

    /**
     * @inheritDoc
     */
    public function setCategory(?string $category): void
    {
        $this->setData(self::CATEGORY, $category);
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryType(): ?string
    {
        return $this->getData(self::DELIVERY_TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setDeliveryType(?string $deliveryType): void
    {
        $this->setData(self::DELIVERY_TYPE, $deliveryType);
    }

    /**
     * @inheritDoc
     */
    public function getPriceType(): ?string
    {
        return $this->getData(self::PRICE_TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setPriceType(?string $priceType): void
    {
        $this->setData(self::PRICE_TYPE, $priceType);
    }

    /**
     * @inheritDoc
     */
    public function getOrderType(): ?string
    {
        return $this->getData(self::ORDER_TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setOrderType(?string $orderType): void
    {
        $this->setData(self::ORDER_TYPE, $orderType);
    }

    /**
     * @inheritDoc
     */
    public function getProductCategory(): ?string
    {
        return $this->getData(self::PRODUCT_CATEGORY);
    }

    /**
     * @inheritDoc
     */
    public function setProductCategory(?string $productCategory): void
    {
        $this->setData(self::PRODUCT_CATEGORY, $productCategory);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMethod(): ?string
    {
        return $this->getData(self::PAYMENT_METHOD);
    }

    /**
     * @inheritDoc
     */
    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->setData(self::PAYMENT_METHOD, $paymentMethod);
    }

    /**
     * @inheritDoc
     */
    public function getSource(): ?string
    {
        return $this->getData(self::SOURCE);
    }

    /**
     * @inheritDoc
     */
    public function setSource(?string $source): void
    {
        $this->setData(self::SOURCE, $source);
    }

    /**
     * @inheritDoc
     */
    public function getCheckMethod(): ?string
    {
        return $this->getData(self::CHECK_METHOD);
    }

    /**
     * @inheritDoc
     */
    public function setCheckMethod(?string $checkMethod): void
    {
        $this->setData(self::CHECK_METHOD, $checkMethod);
    }

    /**
     * @inheritDoc
     */
    public function getCodAmount(): ?float
    {
        return $this->getData(self::COD_AMOUNT) === null ? null
            : (float)$this->getData(self::COD_AMOUNT);
    }

    /**
     * @inheritDoc
     */
    public function setCodAmount(?float $codAmount): void
    {
        $this->setData(self::COD_AMOUNT, $codAmount);
    }

    /**
     * @inheritDoc
     */
    public function getDeposit(): ?float
    {
        return $this->getData(self::DEPOSIT) === null ? null
            : (float)$this->getData(self::DEPOSIT);
    }

    /**
     * @inheritDoc
     */
    public function setDeposit(?float $deposit): void
    {
        $this->setData(self::DEPOSIT, $deposit);
    }

    /**
     * @inheritDoc
     */
    public function getCashAccount(): ?float
    {
        return $this->getData(self::CASH_ACCOUNT) === null ? null
            : (float)$this->getData(self::CASH_ACCOUNT);
    }

    /**
     * @inheritDoc
     */
    public function setCashAccount(?float $cashAccount): void
    {
        $this->setData(self::CASH_ACCOUNT, $cashAccount);
    }

    /**
     * @inheritDoc
     */
    public function getBankTransferNumber(): ?string
    {
        return $this->getData(self::BANK_TRANSFER_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function setBankTransferNumber(?string $bankTransferNumber): void
    {
        $this->setData(self::BANK_TRANSFER_NUMBER, $bankTransferNumber);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentAppointmentDate(): ?string
    {
        return $this->getData(self::PAYMENT_APPOINTMENT_DATE);
    }

    /**
     * @inheritDoc
     */
    public function setPaymentAppointmentDate(?string $paymentTransferDate): void
    {
        $this->setData(self::PAYMENT_APPOINTMENT_DATE, $paymentTransferDate);
    }
}
