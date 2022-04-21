<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Voucher;
use App\Models\UserVoucher;
use App\Models\VoucherType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserVoucher>
 */
class UserVoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_FK_userID'=>$this->faker->unique()->randomElement(User::all()->pluck('PK_userID')->toArray()),
            'PK_FK_voucherID'=>$this->faker->randomElement(Voucher::all()->pluck('PK_voucherID')->toArray()),
        ];
    }
}
