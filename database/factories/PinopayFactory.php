<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Pinopay;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pinopay>
 */
class PinopayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'FK_userID' => $this->faker->unique()->randomElement(User::all()->pluck('PK_userID')->toArray()),
            'balance' => $this->faker->randomFloat(2, 10, 50),
            'PIN' =>  $this->faker->numerify('######')
        ];
    }
}
