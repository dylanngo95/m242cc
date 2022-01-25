<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;
use QT\CustomSalesOrder\Model\CustomSalesShipment;
use QT\CustomSalesOrder\Model\CustomSalesShipmentFactory;
use QT\CustomSalesOrder\Model\CustomSalesShipmentRepository;

/**
 * Class ShipmentProcessor
 * @package QT\CustomSalesOrder\Observer
 */
class ShipmentProcessor implements ObserverInterface
{
    /**
     * @var OrderExtensionFactory
     */
    private OrderExtensionFactory $orderExtensionFactory;

    /**
     * @var CustomSalesShipmentFactory
     */
    private CustomSalesShipmentFactory $customSalesShipmentFactory;

    /**
     * @var CustomSalesShipmentRepository
     */
    private CustomSalesShipmentRepository $customSalesShipmentRepository;

    /**
     * ShipmentProcessor constructor.
     * @param OrderExtensionFactory $orderExtensionFactory
     * @param CustomSalesShipmentFactory $customSalesShipmentFactory
     * @param CustomSalesShipmentRepository $customSalesShipmentRepository
     */
    public function __construct(
        OrderExtensionFactory $orderExtensionFactory,
        CustomSalesShipmentFactory $customSalesShipmentFactory,
        CustomSalesShipmentRepository $customSalesShipmentRepository
    ) {
        $this->orderExtensionFactory = $orderExtensionFactory;
        $this->customSalesShipmentFactory = $customSalesShipmentFactory;
        $this->customSalesShipmentRepository = $customSalesShipmentRepository;
    }

    /**
     * @param Observer $observer
     * @return mixed|void
     * @throws \Magento\Framework\Webapi\Exception
     */
    public function execute(Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order\Shipment $shipment */
        $shipment = $observer->getEvent()->getShipment();
        if ($shipment->getOrigData('entity_id')) {
            return;
        }

        $order = $shipment->getOrder();
        if (!$order) {
            return;
        }
        $orderId = (int) $order->getEntityId();
        /** @var OrderExtensionInterface $extensionAttributes */
        $extensionAttributes = $order->getExtensionAttributes() ?? $this->orderExtensionFactory->create();
        $shippingAssignments = $extensionAttributes->getShippingAssignments();
        if (!count($shippingAssignments)) {
            return;
        }
        /** @var \Magento\Sales\Api\Data\ShippingAssignmentInterface $shippingAssignment */
        $shippingAssignment = $shippingAssignments[array_key_first($shippingAssignments)];
        /** @var \Magento\Sales\Api\Data\OrderAddressInterface $shippingAddress */
        $shippingAddress = $shippingAssignment->getShipping()->getAddress();

        /** @var CustomSalesShipment $customSalesShipment */
        $customSalesShipment = $this->customSalesShipmentFactory->create();

        $customSalesShipmentOld = $this->customSalesShipmentRepository->getByOrderId($orderId);
        if ($customSalesShipmentOld) {
            $customSalesShipment->setEntity($customSalesShipmentOld->getEntity());
        }

        $customSalesShipment->setOrderId($orderId);
        $customSalesShipment->setCity($shippingAddress->getCity());
        $customSalesShipment->setStreet(implode(",", $shippingAddress->getStreet()));
        $customSalesShipment->setDeliveryStatus(CustomSalesShipmentInterface::STATUS_NEW);
        $this->customSalesShipmentRepository->save($customSalesShipment);
    }
}
