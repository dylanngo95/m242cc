<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Plugin\Magento\Sales\Api;

use Magento\Catalog\Model\CategoryRepositoryFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductRepositoryFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Model\ResourceModel\Order\Collection;
use QT\CustomSalesOrder\Model\CustomSalesOrderFactory as ObjectModelFactory;
use QT\CustomSalesOrder\Model\CustomSalesOrderRepository;
use QT\CustomSalesOrder\Model\CustomSalesShipment;
use QT\CustomSalesOrder\Model\CustomSalesShipmentRepository;

/**
 * Class OrderRepositoryInterface
 */
class OrderRepositoryInterface
{
    /**
     * @var OrderExtensionFactory
     */
    private $orderExtensionFactory;

    /**
     * @var CustomSalesOrderRepository
     */
    private $customSalesOrderRepository;

    /**
     * @var ObjectModelFactory
     */
    private $objectModelFactory;

    /**
     * @var CustomSalesShipmentRepository
     */
    private $customSalesShipmentRepository;

    /**
     * @var ProductRepositoryFactory
     */
    private $productRepositoryFactory;

    /**
     * @var CategoryRepositoryFactory
     */
    private $categoryRepositoryFactory;

    /**
     * OrderRepositoryInterface constructor.
     * @param OrderExtensionFactory $orderExtensionFactory
     * @param ObjectModelFactory $objectModelFactory
     * @param CustomSalesOrderRepository $customSalesOrderRepository
     * @param CustomSalesShipmentRepository $customSalesShipmentRepository
     * @param ProductRepositoryFactory $productRepositoryFactory
     * @param CategoryRepositoryFactory $categoryRepositoryFactory
     */
    public function __construct(
        OrderExtensionFactory $orderExtensionFactory,
        ObjectModelFactory $objectModelFactory,
        CustomSalesOrderRepository $customSalesOrderRepository,
        CustomSalesShipmentRepository $customSalesShipmentRepository,
        ProductRepositoryFactory $productRepositoryFactory,
        CategoryRepositoryFactory $categoryRepositoryFactory
    ) {
        $this->orderExtensionFactory = $orderExtensionFactory;
        $this->objectModelFactory = $objectModelFactory;
        $this->customSalesOrderRepository = $customSalesOrderRepository;
        $this->customSalesShipmentRepository = $customSalesShipmentRepository;
        $this->productRepositoryFactory = $productRepositoryFactory;
        $this->categoryRepositoryFactory = $categoryRepositoryFactory;
    }

    /**
     * AfterGet.
     *
     * @param \Magento\Sales\Api\OrderRepositoryInterface $subject
     * @param OrderInterface $order
     * @return OrderInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGet(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        OrderInterface $order
    ) {
        /** @var \Magento\Sales\Api\Data\OrderExtension $orderExtension */
        $orderExtension = $order->getExtensionAttributes() ?? $this->orderExtensionFactory->create();
        $orderId = (int) $order->getEntityId();

        $customSalesOrder = $this->customSalesOrderRepository->getByOrderId($orderId);
        if ($customSalesOrder) {
            $orderExtension->setCustomSalesOrderId((int) $customSalesOrder->getEntityId());
            $orderExtension->setSalesChannel((string) $customSalesOrder->getSalesChannel());
            $orderExtension->setSupplier((string) $customSalesOrder->getSupplier());
            $orderExtension->setCsComment((string) $customSalesOrder->getCsComment());
            $orderExtension->setIntegrationId((int) $customSalesOrder->getIntegrationId());
            $orderExtension->setDeliveryNoteId((string) $customSalesOrder->getDeliveryNoteId());
            $orderExtension->setSpecification((string) $customSalesOrder->getSpecification());
            $orderExtension->setCreator((string) $customSalesOrder->getCreator());
            $orderExtension->setCsPerson((string) $customSalesOrder->getCsPerson());
            $orderExtension->setIssuer((string) $customSalesOrder->getIssuer());
            $orderExtension->setSalePerson((string) $customSalesOrder->getSalePerson());
            $orderExtension->setProducts((string) $customSalesOrder->getProducts());
            $orderExtension->setCancelReason((string) $customSalesOrder->getCancelReason());
            $orderExtension->setUseD((string) $customSalesOrder->getUseD());
            $orderExtension->setReconcileStatus((string) $customSalesOrder->getReconcileStatus());
            $orderExtension->setTransferStatus((string) $customSalesOrder->getTransferStatus());
            $orderExtension->setTotalAdvance((float) $customSalesOrder->getTotalAdvance());
            $orderExtension->setTransferDate((string) $customSalesOrder->getTransferDate());
            $orderExtension->setShippingDiscount((string) $customSalesOrder->getShippingDiscount());
            $orderExtension->setCategory((string) $customSalesOrder->getCategory());
            $orderExtension->setDeliveryType((string) $customSalesOrder->getDeliveryType());
            $orderExtension->setPriceType((string) $customSalesOrder->getPriceType());
            $orderExtension->setOrderType((string) $customSalesOrder->getOrderType());
            $orderExtension->setProductCategory((string) $customSalesOrder->getProductCategory());
            $orderExtension->setPaymentMethod((string) $customSalesOrder->getPaymentMethod());
            $orderExtension->setSource((string) $customSalesOrder->getSource());
            $orderExtension->setCheckMethod((string) $customSalesOrder->getCheckMethod());
            $orderExtension->setCodAmount((string) $customSalesOrder->getCodAmount());
            $orderExtension->setDeposit((string) $customSalesOrder->getDeposit());
            $orderExtension->setCashAccount((string) $customSalesOrder->getCashAccount());
            $orderExtension->setBankTransferNumber((string) $customSalesOrder->getBankTransferNumber());
            $orderExtension->setPaymentAppointmentDate((string) $customSalesOrder->getPaymentAppointmentDate());
        }

        /** @var CustomSalesShipment $customSalesShipment */
        $customSalesShipment = $this->customSalesShipmentRepository->getByOrderId($orderId);
        if ($customSalesShipment->getEntityId()) {
            $orderExtension->setCustomSalesShipmentId($customSalesShipment->getEntityId());
            $orderExtension->setContractId((string) $customSalesShipment->getContractId());
            $orderExtension->setCity((string) $customSalesShipment->getCity());
            $orderExtension->setDistrict((string) $customSalesShipment->getDistrict());
            $orderExtension->setStreet((string) $customSalesShipment->getStreet());
            $orderExtension->setCreatedAt((string) $customSalesShipment->getCreatedAt());
            $orderExtension->setConfirmedAt((string) $customSalesShipment->getConfirmedAt());
            $orderExtension->setPackedAt((string) $customSalesShipment->getPackedAt());
            $orderExtension->setSendHvcAt((string) $customSalesShipment->getSendHvcAt());
            $orderExtension->setDeliveryAt((string) $customSalesShipment->getDeliveryAt());
        }

        $order->setExtensionAttributes($orderExtension);
        return $order;
    }

    /**
     * AfterGetList.
     *
     * @param \Magento\Sales\Api\OrderRepositoryInterface $subject
     * @param Collection $result
     * @return Collection
     */
    public function afterGetList(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        Collection $result
    ) {
        /** @var OrderInterface $order */
        foreach ($result->getItems() as $order) {
            $this->afterGet($subject, $order);
        }
        return $result;
    }

    /**
     * AfterSave.
     *
     * @param \Magento\Sales\Api\OrderRepositoryInterface $subject
     * @param OrderInterface $order
     * @return OrderInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException|\Magento\Framework\Webapi\Exception
     * @throws NoSuchEntityException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterSave(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        OrderInterface $order
    ) {

        /** @var \Magento\Sales\Api\Data\OrderExtensionInterface $orderExtension */
        $orderExtension = $order->getExtensionAttributes() ?? $this->orderExtensionFactory->create();
        $orderId = (int) $order->getEntityId();

        if ($orderId) {
            /** @var \QT\CustomSalesOrder\Model\CustomSalesOrder $customSalesOrder */
            $customSalesOrder = $this->objectModelFactory->create();

            $customSalesOrderOld = $this->customSalesOrderRepository->getByOrderId($orderId);
            if ($customSalesOrderOld) {
                $customSalesOrder->setEntityId((int) $customSalesOrderOld->getEntityId());
            }

            $customSalesOrder->setOrderId($orderId);
            $customSalesOrder->setIntegrationId($orderExtension->getIntegrationId());
            $customSalesOrder->setSalesChannel($orderExtension->getSalesChannel());
            $customSalesOrder->setCsComment($orderExtension->getCsComment());
            $customSalesOrder->setSupplier($orderExtension->getSupplier());
            $customSalesOrder->setDeliveryNoteId($orderExtension->getDeliveryNoteId());
            $customSalesOrder->setSpecification($orderExtension->getSpecification());
            $customSalesOrder->setCreator($orderExtension->getCreator());
            $customSalesOrder->setCsPerson($orderExtension->getCsPerson());
            $customSalesOrder->setIssuer($orderExtension->getIssuer());
            $customSalesOrder->setSalePerson($orderExtension->getSalePerson());
            $customSalesOrder->setCancelReason($orderExtension->getCancelReason());
            $customSalesOrder->setUseD($orderExtension->getUseD());
            $customSalesOrder->setReconcileStatus($orderExtension->getReconcileStatus());
            $customSalesOrder->setTransferStatus($orderExtension->getTransferStatus());
            $customSalesOrder->setTotalAdvance($orderExtension->getTotalAdvance());
            $customSalesOrder->setTransferDate($orderExtension->getTransferDate());
            $customSalesOrder->setShippingDiscount((float) $orderExtension->getShippingDiscount());
            $customSalesOrder->setCategory($orderExtension->getCategory());
            $customSalesOrder->setDeliveryType($orderExtension->getDeliveryType());
            $customSalesOrder->setPriceType($orderExtension->getPriceType());
            $customSalesOrder->setOrderType($orderExtension->getOrderType());
            $customSalesOrder->setSource($orderExtension->getSource());
            $customSalesOrder->setCheckMethod($orderExtension->getCheckMethod());
            $customSalesOrder->setCodAmount((float) $orderExtension->getCodAmount());
            $customSalesOrder->setDeposit((float) $orderExtension->getDeposit());
            $customSalesOrder->setCashAccount((float) $orderExtension->getCashAccount());
            $customSalesOrder->setBankTransferNumber((string) $orderExtension->getBankTransferNumber());
            $customSalesOrder->setPaymentAppointmentDate((string) $orderExtension->getPaymentAppointmentDate());

            if ($orderExtension->getProductCategory()) {
                $customSalesOrder->setProductCategory($orderExtension->getProductCategory());
            } else {
                $customSalesOrder->setProductCategory($this->getProductCategory($order));
            }

            if ($orderExtension->getPaymentMethod()) {
                $customSalesOrder->setPaymentMethod($orderExtension->getPaymentMethod());
            } else {
                $paymentMethod = $order->getPayment() ? $order->getPayment()->getMethod() : "";
                $customSalesOrder->setPaymentMethod($paymentMethod);
            }

            if ($orderExtension->getProducts()) {
                $customSalesOrder->setProducts($orderExtension->getProducts());
            } else {
                $skus = [];
                $items = $order->getItems();
                foreach ($items as $item) {
                    $skus[] = $item->getSku();
                }
                $customSalesOrder->setProducts(implode(",", $skus));
            }

            $this->customSalesOrderRepository->save($customSalesOrder);
        }

        return $order;
    }

    /**
     * GetProductCategory.
     *
     * @param OrderInterface $order
     * @return string
     * @throws NoSuchEntityException
     */
    private function getProductCategory(
        OrderInterface $order
    ): string {
        $productCategories = [];
        $items = $order->getItems();
        foreach ($items as $item) {

            /** @var Product $product */
            $product = $this->productRepositoryFactory
                ->create()
                ->getById((int) $item->getProductId());

            $categoryIds = $product->getCategoryIds();
            foreach ($categoryIds as $categoryId) {
                $category = $this->categoryRepositoryFactory
                    ->create()
                    ->get($categoryId);
                $categoryName = $category->getName();
                $productCategories[] = $categoryName;
            }
        }
        return implode(",", $productCategories);
    }
}
