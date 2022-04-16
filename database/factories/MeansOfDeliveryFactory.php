<?php

namespace Database\Factories;

use App\Models\MeansOfDelivery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MeansOfDeliver>
 */
class MeansOfDeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_deliveryCode' => $this->faker->unique()->randomNumber(2),
            'deliveryName' => $this->faker->name,
            'description' => $this->faker->sentence
        ];
    }
}
