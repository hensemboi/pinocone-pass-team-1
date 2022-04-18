<?php

namespace Database\Factories;

use App\Models\VoucherType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VoucherType>
 */
class VoucherTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_voucherTypeCode' => $this->faker->unique()->randomNumber(2),
            'name' => $this->faker->name,
            'description' => $this->faker->sentence
        ];
    }
}
