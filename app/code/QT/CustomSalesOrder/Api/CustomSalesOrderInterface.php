<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Api;

/**
 * Interface CustomSalesOrderInterface
 * @package QT\CustomSalesOrder\Api
 */
interface CustomSalesOrderInterface
{
    /**
     * String constants for property names
     */
    const ENTITY_ID = "entity_id";
    const ORDER_ID = "order_id";
    const INTEGRATION_ID = "integration_id";
    const SALES_CHANNEL = "sales_channel";
    const DELIVERY_NOTE_ID = "delivery_note_id";
    const SPECIFICATION = "specification";
    const CREATOR = "creator";
    const CS_PERSON = "cs_person";
    const ISSUER = "issuer";
    const SALE_PERSON = "sale_person";
    const PRODUCTS = "products";
    const CS_COMMENT = "cs_comment";
    const SUPPLIER = "supplier";
    const CANCEL_REASON = "cancel_reason";
    const USE_D = "use_d";
    const RECONCILE_STATUS = "reconcile_status";
    const TRANSFER_STATUS = "transfer_status";
    const TOTAL_ADVANCE = "total_advance";
    const TRANSFER_DATE = "transfer_date";
    const SHIPPING_DISCOUNT = "shipping_discount";
    const CATEGORY = "category";
    const DELIVERY_TYPE = "delivery_type";
    const PRICE_TYPE = "price_type";
    const ORDER_TYPE = "order_type";
    const PRODUCT_CATEGORY = "product_category";
    const PAYMENT_METHOD = "payment_method";
    const SOURCE = "source";
    const CHECK_METHOD = "check_method";
    const COD_AMOUNT = "cod_amount";
    const DEPOSIT = "deposit";
    const CASH_ACCOUNT = "cash_account";
    const BANK_TRANSFER_NUMBER = "bank_transfer_number";
    const PAYMENT_APPOINTMENT_DATE = "payment_appointment_date";

    /**
     * Getter for EntityId.
     *
     * @return int|null
     */
    public function getEntityId();

    /**
     * Setter for EntityId.
     *
     * @param int|null $entityId
     *
     * @return void
     */
    public function setEntityId($entityId);

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
     * Getter for IntegrationId.
     *
     * @return int|null
     */
    public function getIntegrationId(): ?int;

    /**
     * Setter for IntegrationId.
     *
     * @param int|null $integrationId
     *
     * @return void
     */
    public function setIntegrationId(?int $integrationId): void;

    /**
     * Getter for SalesChannel.
     *
     * @return string|null
     */
    public function getSalesChannel(): ?string;

    /**
     * Setter for SalesChannel.
     *
     * @param string|null $salesChannel
     *
     * @return void
     */
    public function setSalesChannel(?string $salesChannel): void;

    /**
     * Getter for DeliveryNoteId.
     *
     * @return string|null
     */
    public function getDeliveryNoteId(): ?string;

    /**
     * Setter for DeliveryNoteId.
     *
     * @param string|null $deliveryNoteId
     *
     * @return void
     */
    public function setDeliveryNoteId(?string $deliveryNoteId): void;

    /**
     * Getter for Specification.
     *
     * @return string|null
     */
    public function getSpecification(): ?string;

    /**
     * Setter for Specification.
     *
     * @param string|null $specification
     *
     * @return void
     */
    public function setSpecification(?string $specification): void;

    /**
     * Getter for Creator.
     *
     * @return string|null
     */
    public function getCreator(): ?string;

    /**
     * Setter for Creator.
     *
     * @param string|null $creator
     *
     * @return void
     */
    public function setCreator(?string $creator): void;

    /**
     * Getter for CsPerson.
     *
     * @return string|null
     */
    public function getCsPerson(): ?string;

    /**
     * Setter for CsPerson.
     *
     * @param string|null $csPerson
     *
     * @return void
     */
    public function setCsPerson(?string $csPerson): void;

    /**
     * Getter for Issuer.
     *
     * @return string|null
     */
    public function getIssuer(): ?string;

    /**
     * Setter for Issuer.
     *
     * @param string|null $issuer
     *
     * @return void
     */
    public function setIssuer(?string $issuer): void;

    /**
     * Getter for SalePerson.
     *
     * @return string|null
     */
    public function getSalePerson(): ?string;

    /**
     * Setter for SalePerson.
     *
     * @param string|null $salePerson
     *
     * @return void
     */
    public function setSalePerson(?string $salePerson): void;

    /**
     * Getter for Products.
     *
     * @return string|null
     */
    public function getProducts(): ?string;

    /**
     * Setter for Products.
     *
     * @param string|null $products
     *
     * @return void
     */
    public function setProducts(?string $products): void;

    /**
     * Getter for CsComment.
     *
     * @return string|null
     */
    public function getCsComment(): ?string;

    /**
     * Setter for CsComment.
     *
     * @param string|null $csComment
     *
     * @return void
     */
    public function setCsComment(?string $csComment): void;

    /**
     * Getter for Supplier.
     *
     * @return string|null
     */
    public function getSupplier(): ?string;

    /**
     * Setter for Supplier.
     *
     * @param string|null $supplier
     *
     * @return void
     */
    public function setSupplier(?string $supplier): void;

    /**
     * Getter for CancelReason.
     *
     * @return string|null
     */
    public function getCancelReason(): ?string;

    /**
     * Setter for CancelReason.
     *
     * @param string|null $cancelReason
     *
     * @return void
     */
    public function setCancelReason(?string $cancelReason): void;

    /**
     * Getter for UseD.
     *
     * @return string|null
     */
    public function getUseD(): ?string;

    /**
     * Setter for UseD.
     *
     * @param string|null $useD
     *
     * @return void
     */
    public function setUseD(?string $useD): void;

    /**
     * Getter for ReconcileStatus.
     *
     * @return string|null
     */
    public function getReconcileStatus(): ?string;

    /**
     * Setter for ReconcileStatus.
     *
     * @param string|null $reconcileStatus
     *
     * @return void
     */
    public function setReconcileStatus(?string $reconcileStatus): void;

    /**
     * Getter for TransferStatus.
     *
     * @return string|null
     */
    public function getTransferStatus(): ?string;

    /**
     * Setter for TransferStatus.
     *
     * @param string|null $transferStatus
     *
     * @return void
     */
    public function setTransferStatus(?string $transferStatus): void;

    /**
     * Getter for TotalAdvance.
     *
     * @return float|null
     */
    public function getTotalAdvance(): ?float;

    /**
     * Setter for TotalAdvance.
     *
     * @param float|null $totalAdvance
     *
     * @return void
     */
    public function setTotalAdvance(?float $totalAdvance): void;

    /**
     * Getter for TransferDate.
     *
     * @return string|null
     */
    public function getTransferDate(): ?string;

    /**
     * Setter for TransferDate.
     *
     * @param string|null $transferDate
     *
     * @return void
     */
    public function setTransferDate(?string $transferDate): void;

    /**
     * Getter for ShippingDiscount.
     *
     * @return float|null
     */
    public function getShippingDiscount(): ?float;

    /**
     * Setter for ShippingDiscount.
     *
     * @param float|null $shippingDiscount
     *
     * @return void
     */
    public function setShippingDiscount(?float $shippingDiscount): void;

    /**
     * Getter for Category.
     *
     * @return string|null
     */
    public function getCategory(): ?string;

    /**
     * Setter for Category.
     *
     * @param string|null $category
     *
     * @return void
     */
    public function setCategory(?string $category): void;

    /**
     * Getter for DeliveryType.
     *
     * @return string|null
     */
    public function getDeliveryType(): ?string;

    /**
     * Setter for DeliveryType.
     *
     * @param string|null $deliveryType
     *
     * @return void
     */
    public function setDeliveryType(?string $deliveryType): void;

    /**
     * Getter for PriceType.
     *
     * @return string|null
     */
    public function getPriceType(): ?string;

    /**
     * Setter for PriceType.
     *
     * @param string|null $priceType
     *
     * @return void
     */
    public function setPriceType(?string $priceType): void;

    /**
     * Getter for OrderType.
     *
     * @return string|null
     */
    public function getOrderType(): ?string;

    /**
     * Setter for OrderType.
     *
     * @param string|null $orderType
     *
     * @return void
     */
    public function setOrderType(?string $orderType): void;

    /**
     * Getter for ProductCategory.
     *
     * @return string|null
     */
    public function getProductCategory(): ?string;

    /**
     * Setter for ProductCategory.
     *
     * @param string|null $productCategory
     *
     * @return void
     */
    public function setProductCategory(?string $productCategory): void;

    /**
     * Getter for PaymentMethod.
     *
     * @return string|null
     */
    public function getPaymentMethod(): ?string;

    /**
     * Setter for PaymentMethod.
     *
     * @param string|null $paymentMethod
     *
     * @return void
     */
    public function setPaymentMethod(?string $paymentMethod): void;

    /**
     * Getter for Source.
     *
     * @return string|null
     */
    public function getSource(): ?string;

    /**
     * Setter for Source.
     *
     * @param string|null $source
     *
     * @return void
     */
    public function setSource(?string $source): void;

    /**
     * Getter for CheckMethod.
     *
     * @return string|null
     */
    public function getCheckMethod(): ?string;

    /**
     * Setter for CheckMethod.
     *
     * @param string|null $checkMethod
     *
     * @return void
     */
    public function setCheckMethod(?string $checkMethod): void;

    /**
     * Getter for CodAmount.
     *
     * @return float|null
     */
    public function getCodAmount(): ?float;

    /**
     * Setter for CodAmount.
     *
     * @param float|null $codAmount
     *
     * @return void
     */
    public function setCodAmount(?float $codAmount): void;

    /**
     * Getter for Deposit.
     *
     * @return float|null
     */
    public function getDeposit(): ?float;

    /**
     * Setter for Deposit.
     *
     * @param float|null $deposit
     *
     * @return void
     */
    public function setDeposit(?float $deposit): void;

    /**
     * Getter for CashAccount.
     *
     * @return float|null
     */
    public function getCashAccount(): ?float;

    /**
     * Setter for CashAccount.
     *
     * @param float|null $cashAccount
     *
     * @return void
     */
    public function setCashAccount(?float $cashAccount): void;

    /**
     * Getter for BankTransferNumber.
     *
     * @return string|null
     */
    public function getBankTransferNumber(): ?string;

    /**
     * Setter for BankTransferNumber.
     *
     * @param string|null $bankTransferNumber
     *
     * @return void
     */
    public function setBankTransferNumber(?string $bankTransferNumber): void;

    /**
     * Getter for PaymentAppointmentDate.
     *
     * @return string|null
     */
    public function getPaymentAppointmentDate(): ?string;

    /**
     * Setter for PaymentAppointmentDate.
     *
     * @param string|null $paymentTransferDate
     *
     * @return void
     */
    public function setPaymentAppointmentDate(?string $paymentTransferDate): void;
}
