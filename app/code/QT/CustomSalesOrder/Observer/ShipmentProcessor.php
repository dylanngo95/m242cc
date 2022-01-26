<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Api\Data\OrderAddressInterface;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderExtensionInterface;
use Magento\Sales\Api\Data\ShippingAssignmentInterface;
use Magento\Sales\Model\Order\Shipment;
use QT\CustomSalesOrder\Api\CustomSalesShipmentInterface;
use QT\CustomSalesOrder\Model\CustomSalesShipment;
use QT\CustomSalesOrder\Model\CustomSalesShipmentFactory;
use QT\CustomSalesOrder\Model\CustomSalesShipmentRepository;

/**
 * Class ShipmentProcessor
 */
class ShipmentProcessor implements ObserverInterface
{
    /**
     * @var OrderExtensionFactory
     */
    private $orderExtensionFactory;

    /**
     * @var CustomSalesShipmentFactory
     */
    private $customSalesShipmentFactory;

    /**
     * @var CustomSalesShipmentRepository
     */
    private $customSalesShipmentRepository;

    /**
     * ShipmentProcessor constructor.
     * @param OrderExtensionFactory $orderExtensionFactory
     * @param CustomSalesShipmentFactory $customSalesShipmentFactory
     * @param CustomSalesShipmentRepository $customSalesShipmentRepository
     * @codeCoverageIgnore
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
     * Execute.
     *
     * @param Observer $observer
     * @throws \Magento\Framework\Webapi\Exception
     */
    public function execute(Observer $observer)
    {
        /** @var Shipment $shipment */
        $shipment = $observer->getEvent()->getData('getShipment');
        if ($shipment->getOrigData('entity_id')) {
            return;
        }

        $order = $shipment->getOrder();
        if (!$order->getEntityId()) {
            return;
        }
        $orderId = (int) $order->getEntityId();

        /** @var OrderExtensionInterface $extensionAttributes */
        $extensionAttributes = $order->getExtensionAttributes() ?? $this->orderExtensionFactory->create();
        $shippingAssignments = $extensionAttributes->getShippingAssignments() ?? [];
        if (!count($shippingAssignments)) {
            return;
        }

        /** @var ShippingAssignmentInterface $shippingAssignment */
        $shippingAssignment = $shippingAssignments[array_key_first($shippingAssignments)];

        /** @var OrderAddressInterface $shippingAddress */
        $shippingAddress = $shippingAssignment->getShipping()->getAddress();

        /** @var CustomSalesShipment $customSalesShipment */
        $customSalesShipment = $this->customSalesShipmentFactory->create();

        $customSalesShipment->setOrderId($orderId);
        $customSalesShipment->setCity($shippingAddress->getCity());
        $customSalesShipment->setStreet(implode(",", $shippingAddress->getStreet() ?? []));
        $customSalesShipment->setDeliveryStatus(CustomSalesShipmentInterface::STATUS_NEW);
        $this->customSalesShipmentRepository->save($customSalesShipment);
    }
}
