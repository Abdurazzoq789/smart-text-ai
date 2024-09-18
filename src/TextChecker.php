<?php

namespace SmartTextAi;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Log\LoggerInterface;

class TextChecker
{
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private LoggerInterface $logger;
    private string $apiKey;

    public function __construct(
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory,
        LoggerInterface $logger,
        string $apiKey
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->logger = $logger;
        $this->apiKey = $apiKey;
    }

    /**
     * Sends a request to the AI API to check the text.
     *
     * @param string $text
     * @return array
     */
    public function checkText(string $text): array
    {
        $this->logger->info('Sending text to AI for checking.');

        $request = $this->requestFactory->createRequest('POST', 'https://api.openai.com/v1/ai-check')
            ->withHeader('Authorization', 'Bearer ' . $this->apiKey)
            ->withHeader('Content-Type', 'application/json')
            ->withBody(json_encode(['text' => $text]));

        try {
            $response = $this->httpClient->sendRequest($request);
            $body = $response->getBody()->getContents();
            $this->logger->info('Response received from AI');
            return json_decode($body, true);
        } catch (\Exception $e) {
            $this->logger->error('Error: ' . $e->getMessage());
            return ['error' => 'API request failed'];
        }
    }
}
