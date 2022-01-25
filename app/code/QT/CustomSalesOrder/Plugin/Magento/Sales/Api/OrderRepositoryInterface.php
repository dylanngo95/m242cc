<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Plugin\Magento\Sales\Api;

use Magento\Catalog\Model\CategoryRepositoryFactory;
use Magento\Catalog\Model\ProductRepositoryFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Model\ResourceModel\Order\Collection;
use QT\CustomSalesOrder\Model\CustomSalesOrderFactory as ObjectModelFactory;
use QT\CustomSalesOrder\Model\CustomSalesOrderRepository;
use QT\CustomSalesOrder\Model\CustomSalesShipmentRepository;

/**
 * Class OrderRepositoryInterface
 * @package QT\CustomSalesOrder\Plugin\Magento\Sales\Api
 */
class OrderRepositoryInterface
{
    /**
     * @var OrderExtensionFactory
     */
    private OrderExtensionFactory $orderExtensionFactory;

    /**
     * @var CustomSalesOrderRepository
     */
    private CustomSalesOrderRepository $customSalesOrderRepository;

    /**
     * @var ObjectModelFactory
     */
    private ObjectModelFactory $objectModelFactory;

    /**
     * @var CustomSalesShipmentRepository
     */
    private CustomSalesShipmentRepository $customSalesShipmentRepository;

    /**
     * @var ProductRepositoryFactory
     */
    private ProductRepositoryFactory $productRepositoryFactory;

    /**
     * @var CategoryRepositoryFactory
     */
    private CategoryRepositoryFactory $categoryRepositoryFactory;

    /**
     * OrderRepositoryInterface constructor.
     * @param OrderExtensionFactory $orderExtensionFactory
     * @param ObjectModelFactory $objectModelFactory
     * @param CustomSalesOrderRepository $customSalesOrderRepository
     * @param CustomSalesShipmentRepository $customSalesShipmentRepository
     * @param ProductRepositoryFactory $productRepositoryFactory
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
     * @param \Magento\Sales\Api\OrderRepositoryInterface $subject
     * @param OrderInterface $order
     * @return OrderInterface
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
            $orderExtension->setCustomSalesOrderId($customSalesOrder->getEntityId());
            $orderExtension->setSalesChannel($customSalesOrder->getSalesChannel());
            $orderExtension->setSupplier($customSalesOrder->getSupplier());
            $orderExtension->setCsComment($customSalesOrder->getCsComment());
            $orderExtension->setIntegrationId($customSalesOrder->getIntegrationId());
            $orderExtension->setDeliveryNoteId($customSalesOrder->getDeliveryNoteId());
            $orderExtension->setSpecification($customSalesOrder->getSpecification());
            $orderExtension->setCreator($customSalesOrder->getCreator());
            $orderExtension->setCsPerson($customSalesOrder->getCsPerson());
            $orderExtension->setIssuer($customSalesOrder->getIssuer());
            $orderExtension->setSalePerson($customSalesOrder->getSalePerson());
            $orderExtension->setProducts($customSalesOrder->getProducts());
            $orderExtension->setCancelReason($customSalesOrder->getCancelReason());
            $orderExtension->setUseD($customSalesOrder->getUseD());
            $orderExtension->setReconcileStatus($customSalesOrder->getReconcileStatus());
            $orderExtension->setTransferStatus($customSalesOrder->getTransferStatus());
            $orderExtension->setTotalAdvance($customSalesOrder->getTotalAdvance());
            $orderExtension->setTransferDate($customSalesOrder->getTransferDate());
            $orderExtension->setShippingDiscount($customSalesOrder->getShippingDiscount());
            $orderExtension->setCategory($customSalesOrder->getCategory());
            $orderExtension->setDeliveryType($customSalesOrder->getDeliveryType());
            $orderExtension->setPriceType($customSalesOrder->getPriceType());
            $orderExtension->setOrderType($customSalesOrder->getOrderType());
            $orderExtension->setProductCategory($customSalesOrder->getProductCategory());
            $orderExtension->setPaymentMethod($customSalesOrder->getPaymentMethod());
            $orderExtension->setSource($customSalesOrder->getSource());
            $orderExtension->setCheckMethod($customSalesOrder->getCheckMethod());
            $orderExtension->setCodAmount($customSalesOrder->getCodAmount());
            $orderExtension->setDeposit($customSalesOrder->getDeposit());
            $orderExtension->setCashAccount($customSalesOrder->getCashAccount());
            $orderExtension->setBankTransferNumber($customSalesOrder->getBankTransferNumber());
            $orderExtension->setPaymentAppointmentDate($customSalesOrder->getPaymentAppointmentDate());
        }
        $customSalesShipment = $this->customSalesShipmentRepository->getByOrderId($orderId);
        if ($customSalesShipment) {
            $orderExtension->setCustomSalesShipmentId($customSalesShipment->getEntityId());
            $orderExtension->setShipmentStatus($customSalesShipment->getStatus());
            $orderExtension->setContractId($customSalesShipment->getContractId());
            $orderExtension->setCity($customSalesShipment->getCity());
            $orderExtension->setDistrict($customSalesShipment->getDistrict());
            $orderExtension->setStreet($customSalesShipment->getStreet());
            $orderExtension->setCreatedAt($customSalesShipment->getCreatedAt());
            $orderExtension->setConfirmedAt($customSalesShipment->getConfirmedAt());
            $orderExtension->setPackedAt($customSalesShipment->getPackedAt());
            $orderExtension->setSendHvcAt($customSalesShipment->getSendHvcAt());
            $orderExtension->setDeliveryAt($customSalesShipment->getDeliveryAt());
        }

        $order->setExtensionAttributes($orderExtension);
        return $order;
    }

    /**
     * @param \Magento\Sales\Api\OrderRepositoryInterface $subject
     * @param Collection $result
     * @return Collection
     */
    public function afterGetList(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        Collection $result
    ) {
        foreach ($result->getItems() as $order) {
            $this->afterGet($subject, $order);
        }
        return $result;
    }

    /**
     * @param \Magento\Sales\Api\OrderRepositoryInterface $subject
     * @param OrderInterface $order
     * @return OrderInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException|\Magento\Framework\Webapi\Exception
     * @throws NoSuchEntityException
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
                $customSalesOrder->setEntityId($customSalesOrderOld->getEntityId());
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
            $customSalesOrder->setShippingDiscount($orderExtension->getShippingDiscount());
            $customSalesOrder->setCategory($orderExtension->getCategory());
            $customSalesOrder->setDeliveryType($orderExtension->getDeliveryType());
            $customSalesOrder->setPriceType($orderExtension->getPriceType());
            $customSalesOrder->setOrderType($orderExtension->getOrderType());
            $customSalesOrder->setSource($orderExtension->getSource());
            $customSalesOrder->setCheckMethod($orderExtension->getCheckMethod());
            $customSalesOrder->setCodAmount($orderExtension->getCodAmount());
            $customSalesOrder->setDeposit($orderExtension->getDeposit());
            $customSalesOrder->setCashAccount($orderExtension->getCashAccount());
            $customSalesOrder->setBankTransferNumber($orderExtension->getBankTransferNumber());
            $customSalesOrder->setPaymentAppointmentDate($orderExtension->getPaymentAppointmentDate());

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
            $product = $this->productRepositoryFactory
                ->create()
                ->getById($item->getProductId());
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
