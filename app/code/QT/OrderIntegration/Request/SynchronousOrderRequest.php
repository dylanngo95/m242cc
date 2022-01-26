<?php

declare(strict_types=1);

namespace QT\OrderIntegration\Request;

use QT\OrderIntegration\Helper\Config;
use Magento\Framework\Webapi\Rest\Request;

/**
 * Class SynchronousOrderRequest
 */
class SynchronousOrderRequest
{
    const REQUEST_URI = 'orders/notify';

    /**
     * @var ClientRequest
     */
    private $clientRequest;

    /**
     * @var Config
     */
    private $config;

    /**
     * Synchronous Order Request constructor.
     *
     * @param ClientRequest $clientRequest
     * @param Config $config
     */
    public function __construct(
        ClientRequest $clientRequest,
        Config $config
    ) {
        $this->clientRequest = $clientRequest;
        $this->config = $config;
    }

    /**
     * Synchronous Order By Id.
     *
     * @param int|null $orderId
     * @return \GuzzleHttp\Psr7\Response|\Psr\Http\Message\ResponseInterface|null
     */
    public function synchronousOrderById(?int $orderId)
    {
        if (!$orderId) {
            return null;
        }

        $baseUri = $this->config->getEndpointUrl();

        $headers = [
            "token" => $this->config->getToken()
        ];
        $params = [
            'headers' => $headers
        ];

        return $this->clientRequest->doRequest(
            $baseUri,
            self::REQUEST_URI . "/" . $orderId,
            $params,
            Request::HTTP_METHOD_POST
        );
    }
}
