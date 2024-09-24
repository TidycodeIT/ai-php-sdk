<?php

namespace Tidycode\AIClient;

use Tidycode\AIClient\Contracts\NutritionAssistantContract;
use Tidycode\AIClient\AIClient;
use Exception;

class NutritionAssistant implements NutritionAssistantContract
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
        $this->aiClient = new AiClient(self::NUTRITION_ASSISTANT_SERVCE_BASE_URL, $apiKey);
    }

    /**
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function getMacro(array $data): object
    {
        $endpoint = self::MACRO_ENDPOINT;
        return $this->aiClient->post($endpoint, $data);
    }

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function getFoodList(array $data): void
    {
        $endpoint = self::FOOD_LIST_ENDPOINT;
        $this->aiClient->post($endpoint, $data);
    }

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function getRecipes(array $data): void
    {
        $endpoint = self::RECIPES_ENDPOINT;
        $this->aiClient->post($endpoint, $data);
    }
}
