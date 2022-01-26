<?php

declare(strict_types=1);

namespace QT\OrderIntegration\Model;

use Exception;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\CouldNotSaveException;
use QT\OrderIntegration\Api\Data\OrderIntegrationInterface;
use QT\OrderIntegration\Api\OrderIntegrationRepositoryInterface;
use QT\OrderIntegration\Helper\Config;
use QT\OrderIntegration\Model\ResourceModel\OrderIntegration as ObjectResourceModel;
use QT\OrderIntegration\Model\OrderIntegrationFactory as ObjectModelFactory;
use QT\OrderIntegration\Model\ResourceModel\OrderIntegration\CollectionFactory as OrderIntegrationCollectionFactory;

/**
 * Class OrderIntegrationRepository
 */
class OrderIntegrationRepository implements OrderIntegrationRepositoryInterface
{
    /**
     * @var ObjectResourceModel
     */
    private $objectResourceModel;

    /**
     * @var OrderIntegrationFactory
     */
    private $objectModelFactory;

    /**
     * @var OrderIntegrationCollectionFactory
     */
    private $orderIntegrationCollectionFactory;

    /**
     * @var Config
     */
    private $config;

    /**
     * OrderIntegrationRepository constructor.
     * @param ObjectResourceModel $objectResourceModel
     * @param OrderIntegrationFactory $objectModelFactory
     * @param OrderIntegrationCollectionFactory $orderIntegrationCollectionFactory
     * @param Config $config
     */
    public function __construct(
        ObjectResourceModel $objectResourceModel,
        ObjectModelFactory $objectModelFactory,
        OrderIntegrationCollectionFactory $orderIntegrationCollectionFactory,
        Config $config
    ) {
        $this->objectResourceModel = $objectResourceModel;
        $this->objectModelFactory = $objectModelFactory;
        $this->orderIntegrationCollectionFactory = $orderIntegrationCollectionFactory;
        $this->config = $config;
    }

    /**
     * Save.
     *
     * @param OrderIntegration $orderIntegration
     * @return OrderIntegration
     * @throws CouldNotSaveException
     */
    public function save(OrderIntegration $orderIntegration): OrderIntegration
    {
        try {
            $this->objectResourceModel->save($orderIntegration);
            return $orderIntegration;
        } catch (Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
    }

    /**
     * Get By Id.
     *
     * @param int $id
     * @return OrderIntegrationInterface|null
     */
    public function getById(int $id): ?OrderIntegrationInterface
    {
        $customSalesOrder = $this->objectModelFactory->create();
        $this->objectResourceModel->load($customSalesOrder, $id);
        if (!$customSalesOrder->getEntityId()) {
            return null;
        }
        return $customSalesOrder;
    }

    /**
     * Get By Id.
     *
     * @param int $id
     * @param int $status
     * @param string|null $comment
     * @return OrderIntegrationInterface|null
     * @throws AlreadyExistsException
     */
    public function updateStatusById(int $id, int $status, ?string $comment = null): ?OrderIntegrationInterface
    {
        /** @var OrderIntegration $customSalesOrder */
        $customSalesOrder = $this->objectModelFactory->create();
        $this->objectResourceModel->load($customSalesOrder, $id);
        if (!$customSalesOrder->getEntityId()) {
            return null;
        }
        if ($status === OrderIntegrationInterface::STATUS_FAIL) {
            $maxTry = $customSalesOrder->getMaxTry() + 1;
            $customSalesOrder->setMaxTry($maxTry);
        }
        if ($comment) {
            $customSalesOrder->setComment($comment);
        }
        $customSalesOrder->setStatus($status);
        $this->objectResourceModel->save($customSalesOrder);
        return $customSalesOrder;
    }

    /**
     * Get Order Integration New.
     *
     * @return array
     */
    public function getOrderIntegrationNew(): array
    {
        $batchSize = $this->config->getBatchSize() ?? 500;
        $result = $this->orderIntegrationCollectionFactory
            ->create()
            ->addFieldToSelect(['entity_id'])
            ->addFieldToFilter('status', ['eq' => OrderIntegrationInterface::STATUS_NEW])
            ->setPageSize($batchSize);
        return $result->getItems();
    }

    /**
     * Get Order Integration Fail.
     *
     * @return array
     */
    public function getOrderIntegrationFail(): array
    {
        $batchSize = $this->config->getBatchSize() ?? 500;
        $result = $this->orderIntegrationCollectionFactory
            ->create()
            ->addFieldToSelect(['entity_id'])
            ->addFieldToFilter('status', ['eq' => OrderIntegrationInterface::STATUS_FAIL])
            ->setPageSize($batchSize);
        return $result->getItems();
    }
}
