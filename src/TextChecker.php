<?php

namespace SmartTextAi;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class TextChecker
{
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private string $apiKey;

    public function __construct(
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory,
        string $apiKey
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->apiKey = $apiKey;
    }

    /**
     * @param array $body
     * @return string[]
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function checkText(array $body): array
    {
        $url = Url::chatUrl();
        // Prepare the body as a JSON string
        $body = json_encode($body);

        // Convert the body to a stream
        $streamBody = Utils::streamFor($body);

        $request = $this->requestFactory->createRequest('POST', $url)
            ->withHeader('Authorization', 'Bearer ' . $this->apiKey)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($streamBody);

        try {
            $response = $this->httpClient->sendRequest($request);
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        } catch (\Exception $e) {
            return ['error' => 'API request failed'];
        }
    }
}
