<?php

namespace SmartTextAi\providers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use SmartTextAi\auth\Authorization;
use SmartTextAi\interfaces\AiProviderInterface;
use SmartTextAi\url\OpenAiUrl;

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
     * @throws \Exception
     */
    public function sendRequest(array $body, string $url): array
    {
        // Prepare the body as a JSON string
        $body = json_encode($body);

        // Convert the body to a stream
        $streamBody = Utils::streamFor($body);

        $request = $this->requestFactory->createRequest('POST', $url)
            ->withHeader('Authorization', $this->authorization->getHeaders()['Authorization'])
            ->withHeader('Content-Type', $this->authorization->getHeaders()['Content-Type'])
            ->withBody($streamBody);

        $response = $this->httpClient->sendRequest($request);
        if ($response->getStatusCode() == '200') {
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        } else {
            // Parse the response body to extract the error message if available
            $body = $response->getBody()->getContents();
            $errorData = json_decode($body, true);

            $errorMessage = $errorData['error']['message'] ?? 'Unknown error occurred';

            // Throw an exception with the error message
            throw new \Exception('API request failed: ' . $errorMessage);
        }
    }

    /**
     * @param array $body
     * @return string[]
     * @throws ClientExceptionInterface
     */
    public function checkText(array $body): array
    {
        $url = OpenAiUrl::chatUrl();
        return $this->sendRequest($body, $url);
    }
}
