<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Voucher;
use App\Models\PaymentMethod;
use App\Models\MeansOfDelivery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user=User::all()->random()->PK_userID;
        $payment=PaymentMethod::all()->random()->PK_paymentCode;
        $voucher=Voucher::all()->random()->PK_voucherCode;
        $del=MeansOfDelivery::All()->random()->PK_deliveryCode;
        return [
            'PK_transactionID'=>$this->faker->unique()->numerify('OR##################'),
            'FK_userID'=>$user,
            'dateTime'=>$this->faker->dateTime(),
            'FK_paymentCode'=>$payment,
            'extraNote'=>$this->faker->sentence(),
            'totalPrice'=>$this->faker->randomFloat(2,1,100),
            'FK_voucherID'=>$voucher,
            'FK_deliveryCode'=>$del
        ];
    }
}
