<?php

namespace Database\Factories;

use App\Models\VoucherType;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_voucherID' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->name,
            'startDate' =>  $this->faker->date,
            'expiryDate' =>  $this->faker->date,
            'duration' => $this->faker->time,
            'availability' => $this->faker->randomNumber(2),
            'membership' => $this->faker->randomNumber(2),
            'FK_voucherTypeCode' => $this->faker->randomElement(VoucherType::all()->pluck('PK_voucherTypeCode')->toArray())
        ];
    }
}
