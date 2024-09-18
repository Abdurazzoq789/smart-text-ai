<?php

namespace SmartTextAi\providers;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use SmartTextAi\auth\Authorization;
use SmartTextAi\interfaces\AiProviderInterface;
use SmartTextAi\interfaces\AiResponseInterface;
use SmartTextAi\responses\openAi\OpenAiFileResponse;
use SmartTextAi\responses\openAi\OpenAiResponse;
use SmartTextAi\url\OpenAiUrl;

class OpenAiProvider implements AiProviderInterface
{
    private ClientInterface $httpClient;
    private Authorization $authorization;

    public function __construct(Authorization $authorization)
    {
        $this->authorization = $authorization;
        $this->httpClient = new Client();
    }

    /**
     * @param array $body
     * @return OpenAiResponse | OpenAiFileResponse | AiResponseInterface
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Exception
     */
    public function sendRequest(array $body, string $url): AiResponseInterface
    {
        // Determine if the body contains a file
        $isMultipart = false;
        foreach ($body as $key => $value) {
            if (is_array($value) && isset($value['file'])) {
                $isMultipart = true;
                break;
            }
        }

        // Prepare headers
        $headers = [
            'Authorization' => $this->authorization->getHeaders()['Authorization'],
        ];

        if ($isMultipart) {
            // Handle multipart data
            $multipart = [];
            foreach ($body as $name => $content) {
                if (is_array($content) && isset($content['file'])) {
                    $multipart[] = [
                        'name' => $name,
                        'contents' => fopen($content['file'], 'r'),
                        'filename' => basename($content['file'])
                    ];
                } else {
                    $multipart[] = [
                        'name' => $name,
                        'contents' => $content
                    ];
                }
            }

            $options = [
                'headers' => $headers,
                'multipart' => $multipart
            ];
        } else {
            // Handle JSON data
            $headers['Content-Type'] = 'application/json';
            $body = json_encode($body);

            $options = [
                'headers' => $headers,
                'body' => $body
            ];
        }

        $response = $this->httpClient->request('POST', $url, $options);

        if ($response->getStatusCode() == 200) {
            $responseBody = $response->getBody()->getContents();
            $data = json_decode($responseBody, true);

            // Return the custom class object
            if ($isMultipart) {
                return new OpenAiFileResponse($data);
            }

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
    public function checkText(array $body): OpenAiResponse
    {
        $url = OpenAiUrl::chatUrl();
        return $this->sendRequest($body, $url);
    }

    /**
     * Converts an array of associative arrays to JSONL format.
     *
     * @param array $data Array of associative arrays to be converted.
     * @return string The converted JSONL string.
     */
    public function makeJsonl(array $data): string
    {
        $jsonlLines = array_map(function ($item) {
            return json_encode($item);
        }, $data);

        return implode(PHP_EOL, $jsonlLines);
    }

    /**
     * @param array $body
     * @return OpenAiResponse
     * @throws ClientExceptionInterface
     */
    public function uploadFile(array $body): OpenAiResponse
    {
        $url = OpenAiUrl::filesUrl();
        return $this->sendRequest($body, $url);
    }
}
