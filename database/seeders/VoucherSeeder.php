<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowDate = date_create(date('Y-m-d'));
        $futureDate = date_create('2022-9-29');

        Voucher::create([
            'PK_voucherID' => 1,
            'name' => 'Fun 40',
            'startDate' =>  $nowDate,
            'expiryDate' =>  $futureDate,
            'duration' => date_diff($nowDate, $futureDate)->format('%h'),
            'availability' => 22,
            'membership' => 4,
            'FK_voucherTypeCode' => 1
        ]);

        Voucher::create([
            'PK_voucherID' => 2,
            'name' => 'Happy 20',
            'startDate' =>  $nowDate,
            'expiryDate' =>  $futureDate,
            'duration' => date_diff($nowDate, $futureDate)->format('%h'),
            'availability' => 7,
            'membership' => 10,
            'FK_voucherTypeCode' => 2
        ]);
    }
}
