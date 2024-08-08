<?php

namespace Tidycode\AIClient\Contracts;

use Exception;

interface AIClientContract
{
    /**
     * @param string $endpoint
     * @param array $params
     * @return object
     * @throws Exception
     */
    public function get(string $endpoint, array $params = []): object;

    /**
     * @param string $endpoint
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function post(string $endpoint, array $data = []): object;
}
