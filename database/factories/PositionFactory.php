<?php

namespace Database\Factories;

use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_positionCode'=>$this->faker->unique()->numerify('PO##'),
            'name'=>$this->faker->unique()->word(),
            'description'=>$this->faker->sentence(),
            'FK_divisionCode'=>$this->faker->randomElement(Division::all()->random()->PK_divisionID)
        ];
    }
}
