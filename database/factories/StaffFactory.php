<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_staffID'=>$this->faker->unique()->numerify('ST##################'),
            'firstName'=>$this->faker->firstName(),
            'lastName'=>$this->faker->lastName(),
            'email'=>$this->faker->unique()->safeEmail(),
            'passwordHash'=>$this->faker->password(8,20),      
            'phoneNo'=>$this->faker->mobileNumber(true, true),
            'FK_positionCode'=> $this->faker->randomElement(Position::all()->pluck('PK_positionID')->toArray()),
        ];
    }
}
