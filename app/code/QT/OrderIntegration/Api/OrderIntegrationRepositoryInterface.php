<?php

declare(strict_types=1);

namespace QT\OrderIntegration\Api;

/**
 * Interface OrderIntegrationRepositoryInterface
 */
interface OrderIntegrationRepositoryInterface
{
    /**
     * Save.
     *
     * @param \QT\OrderIntegration\Model\OrderIntegration $orderIntegration
     * @return \QT\OrderIntegration\Model\OrderIntegration
     */
    public function save(
        \QT\OrderIntegration\Model\OrderIntegration $orderIntegration
    ):\QT\OrderIntegration\Model\OrderIntegration;

    /**
     * GetOrderIntegrationNew.
     *
     * @return  \QT\OrderIntegration\Api\Data\OrderIntegrationInterface[]
     */
    public function getOrderIntegrationNew(): ?array;
}
