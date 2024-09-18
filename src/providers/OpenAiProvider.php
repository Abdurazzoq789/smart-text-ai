<?php

namespace SmartTextAi\providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientInterface;
use SmartTextAi\auth\Authorization;
use SmartTextAi\enums\openAi\ResponseEnum;
use SmartTextAi\interfaces\AiProviderInterface;
use SmartTextAi\interfaces\AiResponseInterface;
use SmartTextAi\responses\openAi\BatchResponse;
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
        $this->httpClient = new Client();  // You could inject this as a dependency if desired.
    }

    /**
     * Handles sending requests with appropriate headers, method, and body format.
     *
     * @param array $body Request body
     * @param string $url API endpoint
     * @param string $method HTTP method (default: POST)
     * @return AiResponseInterface|OpenAiResponse|OpenAiFileResponse|BatchResponse
     * @throws \Exception
     */
    public function sendRequest(array $body, string $url, string $method = 'POST', array $param = [])
    {
        try {
            $options = $this->buildRequestOptions($body, $method, $param);
            $response = $this->httpClient->request($method, $url, $options);

            return $this->handleResponse($response, $url, $method);
        } catch (RequestException $e) {
            throw new \Exception('API request failed: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Build the request options based on body and method.
     *
     * @param array $body
     * @param string $method
     * @return array
     */
    private function buildRequestOptions(array $body, string $method, array $queryParams = []): array
    {
        $headers = [
            'Authorization' => $this->authorization->getHeaders()['Authorization']
        ];

        $options = [
            'headers' => $headers,
        ];

        // Add query parameters if they are provided
        if (!empty($queryParams)) {
            $options['query'] = $queryParams;
        }

        // Handle GET method
        if ($method === 'GET') {
            $headers['Content-Type'] = 'application/json';
            return $options;
        }

        // Handle multipart form data
        if ($this->isMultipart($body)) {
            $options['multipart'] = $this->buildMultipartBody($body);
            return $options;
        }

        // Handle JSON body for other methods (e.g., POST, PUT)
        $headers['Content-Type'] = 'application/json';
        $options['body'] = json_encode($body);

        return $options;
    }

    /**
     * Check if the request body is a multipart form.
     *
     * @param array $body
     * @return bool
     */
    private function isMultipart(array $body): bool
    {
        foreach ($body as $value) {
            if (is_array($value) && isset($value['file'])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Build the multipart request body.
     *
     * @param array $body
     * @return array
     */
    private function buildMultipartBody(array $body): array
    {
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
        return $multipart;
    }

    /**
     * Handles the response and returns the appropriate type.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return AiResponseInterface|array|bool
     * @throws \Exception
     */
    private function handleResponse($response, $url, $method)
    {
        $statusCode = $response->getStatusCode();

        if ($statusCode == 200) {
            if ($method == 'DELETE') {
                return true;
            }

            $responseBody = $response->getBody()->getContents();
            $data = json_decode($responseBody, true);


            if (!isset($data['object'])) {
                // Split the string into individual JSON objects if necessary
                $jsonParts = explode("\n", $responseBody);
                $parsedData = [];

                foreach ($jsonParts as $jsonPart) {
                    if ($jsonPart){
                        $result = json_decode($jsonPart, true);
                        $parsedData[] = new OpenAiResponse($result['response']['body']);
                    }
                }
                return $parsedData;
            }

            $method = $this->getAiMethod($url);

            if ($data['object'] == 'list') {
                return array_map(function ($data) use ($method) {
                    $class = ResponseEnum::MapResponse[$method] ?? OpenAiResponse::class;
                    return new $class($data);
                }, $data['data']);
            }

            $class = ResponseEnum::MapResponse[$method] ?? OpenAiResponse::class;
            return new $class($data);
        }

        $this->handleError($response);
    }

    /**
     * Handles errors by parsing the response and throwing exceptions.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @throws \Exception
     */
    private function handleError($response): void
    {
        $body = $response->getBody()->getContents();
        $errorData = json_decode($body, true);
        $errorMessage = $errorData['error']['message'] ?? 'Unknown error occurred';
        throw new \Exception('API request failed: ' . $errorMessage);
    }

    // === Specialized Methods ===

    /**
     * @param array $body
     * @return AiResponseInterface
     * @throws \Exception
     */
    public function checkText(array $body)
    {
        $url = OpenAiUrl::chatUrl();
        return $this->sendRequest($body, $url);
    }

    /**
     * @param array $body
     * @return array|bool|AiResponseInterface|OpenAiResponse|OpenAiFileResponse
     * @throws \Exception
     */
    public function uploadFile(array $body)
    {
        $url = OpenAiUrl::filesUrl();
        return $this->sendRequest($body, $url);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getFiles(): array
    {
        $url = OpenAiUrl::filesUrl();
        return $this->sendRequest([], $url, 'GET');
    }

    /**
     * @param string $id
     * @return array|bool|AiResponseInterface|OpenAiResponse
     * @throws \Exception
     */
    public function getFile(string $id)
    {
        $url = OpenAiUrl::fileUrl($id);
        return $this->sendRequest([], $url, 'GET');
    }

    /**
     * @param string $id
     * @return array|bool|AiResponseInterface|OpenAiFileResponse|OpenAiResponse
     * @throws \Exception
     */
    public function getFileContent(string $id)
    {
        $url = OpenAiUrl::fileContentUrl($id);
        return $this->sendRequest([], $url, 'GET');
    }

    /**
     * @param string $id
     * @return bool
     * @throws \Exception
     */
    public function deleteFile(string $id): bool
    {
        $url = OpenAiUrl::deleteFileUrl($id);
        return $this->sendRequest([], $url, 'DELETE');
    }

    /**
     * @throws \Exception
     */
    public function createBatch(array $body)
    {
        $url = OpenAiUrl::createBatchUrl();
        return $this->sendRequest($body, $url);
    }

    /**
     * @throws \Exception
     */
    public function getBatchList($param = [])
    {
        $url = OpenAiUrl::listBatchUrl();
        return $this->sendRequest([], $url, 'GET', $param);
    }

    /**
     * @throws \Exception
     */
    public function getBatch(string $batch_id)
    {
        $url = OpenAiUrl::getBatchUrl($batch_id);
        return $this->sendRequest([], $url, 'GET');
    }

    /**
     * @throws \Exception
     */
    public function cancelBatch(string $batch_id)
    {
        $url = OpenAiUrl::cancelBatchUrl($batch_id);
        return $this->sendRequest([], $url,);
    }

    /**
     * @param array $data
     * @return string
     */
    public function makeJsonl(array $data): string
    {
        return implode(PHP_EOL, array_map('json_encode', $data));
    }

    private function getAiMethod(string $url): string
    {
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'];

        $pathParts = explode('/', $path);

        if ($pathParts[1] == 'v1') {
            return $pathParts[2] ?? '';
        }

        return $pathParts[1] ?? '';
    }
}
