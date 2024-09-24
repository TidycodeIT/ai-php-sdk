<?php

namespace Tidycode\AIClient\Contracts;

use Exception;

interface NutritionAssistantContract
{
    const NUTRITION_ASSISTANT_SERVCE_BASE_URL = 'https://nutrition-assistant.tidycode.it/api';
    const MACRO_ENDPOINT = '/macro';
    const FOOD_LIST_ENDPOINT = '/food_list';
    const RECIPES_ENDPOINT = '/recipes';

    /**
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function getMacro(array $data): object;

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function getFoodList(array $data): void;

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function getRecipes(array $data): void;
}
