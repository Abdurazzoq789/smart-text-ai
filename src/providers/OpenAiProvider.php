<?php

namespace SmartTextAi\providers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use SmartTextAi\auth\Authorization;
use SmartTextAi\interfaces\AiProviderInterface;

class OpenAiProvider implements AiProviderInterface
{
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private Authorization $authorization;

    public function __construct(Authorization $authorization)
    {
        $this->authorization = $authorization;
        $this->requestFactory = new HttpFactory();
        $this->httpClient = new Client();
    }

    /**
     * Send a prompt to the OpenAI API and return the response.
     *
     * @param string $text
     * @return string[]
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function sendRequest(string $text): array
    {
        // Create the request for OpenAI
        $request = $this->requestFactory->createRequest('POST', 'https://api.openai.com/v1/completions')
            ->withHeader('Authorization', $this->authorization->getHeaders()['Authorization'])
            ->withHeader('Content-Type', $this->authorization->getHeaders()['Content-Type'])
            ->withBody(json_encode(['prompt' => $text, 'max_tokens' => 100]));

        try {
            $response = $this->httpClient->sendRequest($request);
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        } catch (\Exception $e) {
            return ['error' => 'API request failed'];
        }
    }
}
