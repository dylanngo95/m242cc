<?php

declare(strict_types=1);

namespace QT\OrderStatusApi\Model;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

/**
 * Class OrderFetcher
 * @package QT\OrderStatusApi\Model
 */
class OrderFetcher
{
    /**
     * @var OrderRepositoryInterface
     */
    private OrderRepositoryInterface $orderRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

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
     * @return OrderInterface|null
     */
    public function fetchByIncrementId(string $incrementId): ?OrderInterface
    {
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('increment_id', $incrementId, 'eq')->create();
        $orderList = $this->orderRepository->getList($searchCriteria)->getItems();

        return reset($orderList);
    }

    /**
     * Duplicate from \Magento\SalesMessageBus\Order\Fetcher to remove dependency
     *
     * @param int $id
     * @return OrderInterface|null
     */
    public function fetchById(int $id): ?OrderInterface
    {
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('entity_id', $id, 'eq')->create();
        $orderList = $this->orderRepository->getList($searchCriteria)->getItems();

        return count($orderList) ? reset($orderList) : null;
    }
}
