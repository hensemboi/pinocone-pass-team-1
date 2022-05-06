<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StaffInCharge>
 */
class StaffInChargeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_FK_transactionID'=>$this->faker->unique()->randomElement(Order::all()->pluck('PK_transactionID')->toArray()),
            'PK_FK_staffID'=>$this->faker->unique()->randomElement(Staff::all()->pluck('PK_staffID')->toArray()),
        ];
    }
}
