<?php

namespace SmartTextAi\providers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use SmartTextAi\auth\Authorization;
use SmartTextAi\interfaces\AiProviderInterface;
use SmartTextAi\responses\openAi\OpenAiResponse;
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
     * @return OpenAiResponse
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Exception
     */
    public function sendRequest(array $body, string $url): OpenAiResponse
    {
        // For multipart, we won't JSON encode the body as we need a different format
        $multipart = [];
        foreach ($body as $name => $content) {
            if ($name === 'file') {
                $multipart[] = [
                    'name' => $name,
                    'contents' => fopen($content, 'r'),
                    'filename' => basename($content)
                ];
            } else {
                $multipart[] = [
                    'name' => $name,
                    'contents' => $content
                ];
            }
        }

        $response = $this->httpClient->request('POST', $url, [
            'headers' => [
                'Authorization' => $this->authorization->getHeaders()['Authorization'],
            ],
            'multipart' => $multipart
        ]);

        if ($response->getStatusCode() == 200) {
            $responseBody = $response->getBody()->getContents();
            $data = json_decode($responseBody, true);

            return new OpenAiResponse($data);
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
     * @return OpenAiResponse
     * @throws ClientExceptionInterface
     */
    public
    function checkText(array $body): OpenAiResponse
    {
        $url = OpenAiUrl::chatUrl();
        return $this->sendRequest($body, $url);
    }

    public
    function makeJsonl(array $array)
    {

    }

    /**
     * @param array $param
     * @return OpenAiResponse
     * @throws ClientExceptionInterface
     */
    public
    function uploadFile(array $param): OpenAiResponse
    {
        $url = OpenAiUrl::filesUrl();
        return $this->sendRequest($param, $url);
    }
}
