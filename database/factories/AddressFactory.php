<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_FK_userID' => $this->faker->unique()->randomElement(User::all()->pluck('PK_userID')->toArray()),
            'addressNo' => $this->faker->randomNumber(2),
            'customAddress' => $this->faker->address,
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state
        ];
    }
}
