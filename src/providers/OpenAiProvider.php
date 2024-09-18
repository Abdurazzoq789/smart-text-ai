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
     * @return OpenAiResponse | OpenAiFileResponse | AiResponseInterface | true | OpenAiFileResponse[]
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Exception
     */
    public function sendRequest(array $body, string $url, string $method = 'POST')
    {
        $isMultipart = false;
        foreach ($body as $key => $value) {
            if (is_array($value) && isset($value['file'])) {
                $isMultipart = true;
                break;
            }
        }

        $headers = [
            'Authorization' => $this->authorization->getHeaders()['Authorization'],
        ];

        if ($isMultipart) {
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
        } elseif ($method == 'GET') {
            $headers['Content-Type'] = 'application/json';

            $options = [
                'headers' => $headers,
            ];
        } else {
            $headers['Content-Type'] = 'application/json';
            $body = json_encode($body);

            $options = [
                'headers' => $headers,
                'body' => $body
            ];
        }

        $response = $this->httpClient->request($method, $url, $options);

        if ($response->getStatusCode() == 200) {
            $responseBody = $response->getBody()->getContents();
            $data = json_decode($responseBody, true);

            if (!isset($data['object'])) {
                return $data;
            }

            if ($data['deleted'] == true) {
                return true;
            }

            if ($data['object'] == 'list') {
                return array_map(fn($data) => new OpenAiFileResponse($data), $data['data']);
            }

            if ($data['object'] = 'file') {
                return new OpenAiFileResponse($data);
            }

            return new OpenAiResponse($data);
        } else {
            $body = $response->getBody()->getContents();
            $errorData = json_decode($body, true);
            $errorMessage = $errorData['error']['message'] ?? 'Unknown error occurred';

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
     * @return OpenAiResponse | OpenAiFileResponse
     * @throws ClientExceptionInterface
     */
    public function uploadFile(array $body): OpenAiFileResponse
    {
        $url = OpenAiUrl::filesUrl();
        return $this->sendRequest($body, $url);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getFiles()
    {
        $url = OpenAiUrl::filesUrl();
        return $this->sendRequest([], $url, 'GET');
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getFile($id)
    {
        $url = OpenAiUrl::fileUrl($id);
        return $this->sendRequest([], $url, 'GET');
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getFileContent($id)
    {
        $url = OpenAiUrl::fileContentUrl($id);
        return $this->sendRequest([], $url, 'GET');
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function deleteFile($id)
    {
        $url = OpenAiUrl::deleteFileUrl($id);
        return $this->sendRequest([], $url, 'DELETE');
    }
}
