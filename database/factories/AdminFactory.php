<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_FK_staffID' => $this->faker->unique()->randomElement(Staff::all()->pluck('PK_staffID')->toArray()),
            'username' => $this->faker->unique()->userName(),
            'passwordHash'=>$this->faker->password(8,20),          
        ];
    }
}
