<?php

declare(strict_types=1);

namespace QT\CustomSalesOrder\Test\Unit\Observer;

use Magento\Framework\Event;
use Magento\Framework\Event\Observer;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Sales\Api\Data\OrderAddressInterface;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderExtensionInterface;
use Magento\Sales\Api\Data\ShippingAssignmentInterface;
use Magento\Sales\Api\Data\ShippingInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Shipment;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use QT\CustomSalesOrder\Model\CustomSalesShipment;
use QT\CustomSalesOrder\Model\CustomSalesShipmentFactory;
use QT\CustomSalesOrder\Model\CustomSalesShipmentRepository;
use QT\CustomSalesOrder\Observer\ShipmentProcessor;

/**
 * Class ShipmentProcessorTest
 */
class ShipmentProcessorTest extends TestCase
{
    /** @var ShipmentProcessor|null $objectUnderTest */
    protected $objectUnderTest;

    /** @var ObjectManager */
    protected $objectManager;

    /**
     * @var OrderExtensionFactory|MockObject
     */
    private $orderExtensionFactory;

    /**
     * @var CustomSalesShipmentFactory|MockObject
     */
    private $customSalesShipmentFactory;

    /**
     * @var MockObject|CustomSalesShipmentRepository
     */
    private $customSalesShipmentRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->objectManager = new ObjectManager($this);

        $this->orderExtensionFactory = $this->createMock(OrderExtensionFactory::class);
        $this->customSalesShipmentFactory = $this->createMock(CustomSalesShipmentFactory::class);
        $this->customSalesShipmentRepository = $this->createMock(CustomSalesShipmentRepository::class);
        $this->objectUnderTest = $this->objectManager->getObject(ShipmentProcessor::class, [
            'orderExtensionFactory' => $this->orderExtensionFactory,
            'customSalesShipmentFactory' => $this->customSalesShipmentFactory,
            'customSalesShipmentRepository' => $this->customSalesShipmentRepository,
        ]);
    }

    /**
     * TestExecute.
     *
     * @covers \QT\CustomSalesOrder\Observer\ShipmentProcessor::execute
     * @throws \Magento\Framework\Webapi\Exception
     */
    public function testExecute()
    {
        $orderId = 1;

        $observer = $this->createMock(Observer::class);
        $event = $this->createMock(Event::class);

        $shipment = $this->createMock(Shipment::class);
        $order = $this->createMock(Order::class);
        $orderExtensionAttribute = $this->createMock(OrderExtensionInterface::class);
        $shippingAssignmentInterface = $this->createMock(ShippingAssignmentInterface::class);
        $orderAddressInterface = $this->createMock(OrderAddressInterface::class);
        $customSalesShipment = $this->createMock(CustomSalesShipment::class);
        $shippingInterface = $this->createMock(ShippingInterface::class);

        $observer
            ->method('getEvent')
            ->willReturn($event);
        $event
            ->method('getData')
            ->with('getShipment')
            ->willReturn($shipment);
        $shipment
            ->method('getOrigData')
            ->with('entity_id')
            ->willReturn(null);
        $shipment
            ->method('getOrder')
            ->willReturn($order);
        $order->method('getEntityId')
            ->willReturn($orderId);

        $shippingAssignmentInterface
            ->method('getShipping')
            ->willReturn($shippingInterface);
        $shippingInterface
            ->method('getAddress')
            ->willReturn($orderAddressInterface);

        $this->orderExtensionFactory->method('create')
            ->willReturn($orderExtensionAttribute);
        $orderExtensionAttribute
            ->method('getShippingAssignments')
            ->willReturn([$shippingAssignmentInterface]);

        $this->customSalesShipmentFactory
            ->method('create')
            ->willReturn($customSalesShipment);
        $customSalesShipment->method('setOrderId')->willReturnSelf();
        $customSalesShipment->method('setCity')->willReturnSelf();
        $customSalesShipment->method('setStreet')->willReturnSelf();
        $customSalesShipment->method('setDeliveryStatus')->willReturnSelf();
        $this->customSalesShipmentRepository
            ->method('save')
            ->willReturn($customSalesShipment);

        $this->objectUnderTest->execute($observer);
        $this->assertNull(null);
    }
}
