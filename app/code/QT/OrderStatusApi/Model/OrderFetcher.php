<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\ResourceModel\Order\Collection;

/**
 * Class OrderFetcher
 */
class OrderFetcher
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param OrderRepositoryInterface $orderRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->orderRepository = $orderRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Duplicate from \Magento\SalesMessageBus\Order\Fetcher to remove dependency
     *
     * @param string $incrementId
     * @return \Magento\Framework\DataObject
     */
    public function fetchByIncrementId(string $incrementId)
    {
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('increment_id', $incrementId, 'eq')
            ->create();

        /** @var Collection $orderList */
        $orderList = $this->orderRepository
            ->getList($searchCriteria)
            ->getItems();

        return $orderList->getFirstItem();
    }

    /**
     * Duplicate from \Magento\SalesMessageBus\Order\Fetcher to remove dependency
     *
     * @param int $id
     * @return \Magento\Framework\DataObject
     */
    public function fetchById(int $id)
    {
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('entity_id', $id, 'eq')
            ->create();

        /** @var Collection $orderList */
        $orderList = $this->orderRepository
            ->getList($searchCriteria)
            ->getItems();
        return $orderList->getFirstItem();
    }
}
