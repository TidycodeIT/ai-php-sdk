<?php

namespace Tidycode\AIClient;

use Tidycode\AIClient\Contracts\FraudDetectionContract;
use Tidycode\AIClient\AIClient;
use Exception;

class FraudDetection implements FraudDetectionContract
{
    /**
     * @var AiClient
     */
    protected AIClient $aiClient;

    /**
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->aiClient = new AiClient(self::FRAUD_DETECTION_SERVCE_BASE_URL, $apiKey);
    }

    /**
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function detectFraud(array $data): object
    {
        $endpoint = self::PREDICT_ENDPOINT;
        return $this->aiClient->post($endpoint, $data);
    }

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function reportFalsePositive(array $data): void
    {
        $endpoint = self::FALSE_POSITIVE_ENDPOINT;
        $this->aiClient->post($endpoint, $data);
    }

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function reportFalseNegative(array $data): void
    {
        $endpoint = self::FALSE_NEGATIVE_ENDPOINT;
        $this->aiClient->post($endpoint, $data);
    }

    /**
     * @return object
     * @throws Exception
     */
    public function paymentList(): object
    {
        $endpoint = self::PAYMENTS_ENDPOINT;
        return $this->aiClient->get($endpoint);
    }
}
