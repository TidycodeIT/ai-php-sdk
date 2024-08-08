<?php

namespace Tidycode\AIClient\Contracts;

use Exception;

interface FraudDetectionContract
{
    const FRAUD_DETECTION_SERVCE_BASE_URL = 'https://fraud-detection.tidycode.it/api';
    const PREDICT_ENDPOINT = '/predict';
    const FALSE_POSITIVE_ENDPOINT = '/report_fp';
    const FALSE_NEGATIVE_ENDPOINT = '/report_fn';
    const PAYMENTS_ENDPOINT = '/payments_list';
    const SHIPMENTS_ENDPOINT = '/shipments_list';

    /**
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function detectFraud(array $data): object;

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function reportFalsePositive(array $data): void;

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function reportFalseNegative(array $data): void;

    /**
     * @return object
     * @throws Exception
     */
    public function paymentList(): object;
}
