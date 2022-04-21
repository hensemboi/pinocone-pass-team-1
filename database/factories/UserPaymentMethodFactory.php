<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\UserPaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPaymentMethod>
 */
class UserPaymentMethodFactory extends Factory
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
            'PK_FK_paymentCode' => $this->faker->randomElement(PaymentMethod::all()->pluck('PK_paymentCode')->toArray()),
            'cardNo'=>$this->faker->unique()->bankAccountNumber(),
            'balance'=>$this->faker->randomFloat(2,10,1000),
        ];
    }
}
