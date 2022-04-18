<?php

namespace Database\Factories;

use App\Models\CuisineType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CuisineType>
 */
class CuisineTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_cuisineCode' => $this->faker->unique()->randomNumber(2)
        ];
    }
}
