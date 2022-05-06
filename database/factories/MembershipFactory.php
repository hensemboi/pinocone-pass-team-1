<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
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
            'startDate' =>  $this->faker->dateTime(),
            'expiryDate' =>  $this->faker->dateTime(),
            'active' => $this->faker->numberBetween(0, 1)
        ];
    }
}
