<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'PK_paymentCode' => 1,
            'name' => 'Debit Card',
            'description' => 'Bank'
        ]);

        PaymentMethod::create([
            'PK_paymentCode' => 2,
            'name' => 'Pinopay',
            'description' => 'Pinocone'
        ]);
    }
}
