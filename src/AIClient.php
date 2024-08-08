<?php

namespace Tidycode\AIClient;

use Tidycode\AIClient\Contracts\AIClientContract;
use Curl\Curl;
use Exception;

class AIClient implements AIClientContract
{
    /**
     * @var string
     */
    protected string $baseUrl;
    /**
     * @var Curl
     */
    protected Curl $curl;

    /**
     * @param string $baseUrl
     * @param string $apiKey
     */
    public function __construct(string $baseUrl, string $apiKey)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->curl = new Curl();
        $this->curl->setHeader('Authorization', 'Bearer ' . $apiKey);
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return object
     * @throws Exception
     */
    public function get(string $endpoint, array $params = []): object
    {
        $this->curl->get($this->baseUrl . $endpoint, $params);
        return $this->handleResponse();
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function post(string $endpoint, array $data = []): object
    {
        $this->curl->post($this->baseUrl . $endpoint, $data);
        return $this->handleResponse();
    }

    /**
     * @return object
     * @throws Exception
     */
    protected function handleResponse(): object
    {
        if ($this->curl->error) {
            throw new Exception('Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage);
        }

        return $this->curl->response;
    }

    public function __destruct()
    {
        $this->curl->close();
    }
}
