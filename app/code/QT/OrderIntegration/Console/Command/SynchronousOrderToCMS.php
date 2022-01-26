<?php

declare(strict_types=1);

namespace QT\OrderIntegration\Console\Command;

use Magento\Framework\App\State;
use QT\OrderIntegration\Api\Data\OrderIntegrationInterface;
use QT\OrderIntegration\Helper\Config;
use QT\OrderIntegration\Model\OrderIntegrationRepository;
use QT\OrderIntegration\Request\SynchronousOrderRequest;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SynchronousOrderToCMS
 */
class SynchronousOrderToCMS extends AbstractCommand
{
    const RESPONSE_SUCCESS = 200;

    /**
     * @var OrderIntegrationRepository
     */
    private $orderIntegrationRepository;

    /**
     * @var SynchronousOrderRequest
     */
    private $synchronousOrderRequest;

    /**
     * @var Config
     */
    private $config;

    /**
     * SynchronousOrderToCMS constructor.
     * @param State $state
     * @param OrderIntegrationRepository $orderIntegrationRepository
     * @param SynchronousOrderRequest $synchronousOrderRequest
     * @param Config $config
     */
    public function __construct(
        State $state,
        OrderIntegrationRepository $orderIntegrationRepository,
        SynchronousOrderRequest $synchronousOrderRequest,
        Config $config
    ) {
        parent::__construct($state);
        $this->orderIntegrationRepository = $orderIntegrationRepository;
        $this->synchronousOrderRequest = $synchronousOrderRequest;
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    protected function configure(): void
    {
        $this->setName('qt:synchronous_order');
        $this->setDescription('N/A');
        parent::configure();
    }

    /**
     * Execute.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->setAreaIfNotDefined();

        $orderIntegrationNews = $this->orderIntegrationRepository->getOrderIntegrationNew();
        if ($orderIntegrationNews) {
            foreach ($orderIntegrationNews as $orderIntegration) {
                $orderIntegrationItem = $this->orderIntegrationRepository->getById($orderIntegration->getEntityId());
                $this->syncOrderToCMS($orderIntegrationItem);
            }
        } else {
            $orderIntegrationFails = $this->orderIntegrationRepository->getOrderIntegrationFail();
            foreach ($orderIntegrationFails as $orderIntegration) {
                $orderIntegrationItem = $this->orderIntegrationRepository->getById($orderIntegration->getEntityId());
                if ($orderIntegrationItem
                    && $orderIntegrationItem->getMaxTry() >= $this->config->getMaxTry()) {
                    break;
                }
                $this->syncOrderToCMS($orderIntegrationItem);
            }
        }
        $output->writeln("Start synchronous order to cms");
        return 0;
    }

    /**
     * Sync Order To CMS.
     *
     * @param OrderIntegrationInterface|null $orderIntegrationItem
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    private function syncOrderToCMS(?OrderIntegrationInterface $orderIntegrationItem): void
    {
        if (!$orderIntegrationItem) {
            return;
        }

        $this->orderIntegrationRepository->updateStatusById(
            $orderIntegrationItem->getEntityId(),
            OrderIntegrationInterface::STATUS_PROCESSING
        );

        $response = $this->synchronousOrderRequest->synchronousOrderById(
            $orderIntegrationItem->getOrderId()
        );

        if ($response
            && $response->getStatusCode() !== self::RESPONSE_SUCCESS
        ) {
            $this->orderIntegrationRepository->updateStatusById(
                $orderIntegrationItem->getEntityId(),
                OrderIntegrationInterface::STATUS_FAIL,
                $response->getReasonPhrase()
            );
        } else {
            $this->orderIntegrationRepository->updateStatusById(
                $orderIntegrationItem->getEntityId(),
                OrderIntegrationInterface::STATUS_COMPLETE
            );
        }
    }
}
