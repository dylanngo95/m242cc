<?php

declare(strict_types=1);

namespace QT\OrderIntegration\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Sales\Model\Order;
use QT\OrderIntegration\Api\Data\OrderIntegrationInterface;
use QT\OrderIntegration\Api\Data\OrderIntegrationInterfaceFactory;
use QT\OrderIntegration\Model\OrderIntegration;
use QT\OrderIntegration\Model\OrderIntegrationRepository;

/**
 * Class OrderIntegrationObserver
 */
class OrderIntegrationObserver implements ObserverInterface
{
    /**
     * @var OrderIntegrationRepository
     */
    private $orderIntegrationRepository;

    /**
     * @var OrderIntegrationInterfaceFactory
     */
    private $orderIntegrationFactory;

    /**
     * OrderIntegrationObserver constructor.
     * @param OrderIntegrationRepository $orderIntegrationRepository
     * @param OrderIntegrationInterfaceFactory $orderIntegrationFactory
     */
    public function __construct(
        OrderIntegrationRepository $orderIntegrationRepository,
        OrderIntegrationInterfaceFactory $orderIntegrationFactory
    ) {
        $this->orderIntegrationRepository = $orderIntegrationRepository;
        $this->orderIntegrationFactory = $orderIntegrationFactory;
    }

    /**
     * Execute.
     *
     * @param Observer $observer
     * @return void
     * @throws CouldNotSaveException
     */
    public function execute(Observer $observer)
    {
        /* @var Order $order */
        $order = $observer->getEvent()->getData('order');

        /** @var OrderIntegration $orderIntegration */
        $orderIntegration = $this->orderIntegrationFactory->create();

        $orderIntegration->setStoreId((int) $order->getStoreId());
        $orderIntegration->setOrderId((int) $order->getEntityId());
        $orderIntegration->setStatus(OrderIntegrationInterface::STATUS_NEW);

        $this->orderIntegrationRepository->save($orderIntegration);
    }
}
