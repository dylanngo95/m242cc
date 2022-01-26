<?php

declare(strict_types=1);

namespace QT\OrderIntegration\Logger;

use Psr\Log\LoggerInterface;
use QT\OrderIntegration\Helper\Config;

/**
 * Class Logger
 */
class Logger
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var Config
     */
    private $config;

    /**
     * Logger constructor.
     * @param LoggerInterface $logger
     * @param Config $config
     */
    public function __construct(
        LoggerInterface $logger,
        Config $config
    ) {
        $this->logger = $logger;
        $this->config = $config;
    }

    /**
     * Log Info.
     *
     * @param string $message
     * @param array $context
     */
    public function logInfo(string $message, array $context = []): void
    {
        if ($this->config->isLogPayload()) {
            $this->logger->info($message, $context);
        }
    }

    /**
     * Log Critical.
     *
     * @param string $message
     * @param array $context
     */
    public function logCritical(string $message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }

    /**
     * Log Debug.
     *
     * @param string $message
     * @param array $context
     */
    public function logDebug(string $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }
}
