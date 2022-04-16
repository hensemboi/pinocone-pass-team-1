<?php

namespace Database\Factories;

use App\Models\TestUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestUser>
 */
class TestUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->word,
            'email' => $this->faker->unique()->safeEmail,
            'verification_token' => md5($this->faker->safeEmail).rand(10,9999),
            'password' => bcrypt($this->faker->safeEmail),
            'remember_token' => Str::random(10)
        ];
    }
}
