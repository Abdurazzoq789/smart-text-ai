<?php

namespace SmartTextAi\providers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use SmartTextAi\auth\Authorization;
use SmartTextAi\interfaces\AiProviderInterface;
use SmartTextAi\Url;

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
     * @param array $body
     * @return string[]
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function sendRequest(array $body): array
    {
        $url = Url::chatUrl();
        // Prepare the body as a JSON string
        $body = json_encode($body);

        // Convert the body to a stream
        $streamBody = Utils::streamFor($body);

        $request = $this->requestFactory->createRequest('POST', $url)
            ->withHeader('Authorization', $this->authorization->getHeaders()['Authorization'])
            ->withHeader('Content-Type', $this->authorization->getHeaders()['Content-Type'])
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
