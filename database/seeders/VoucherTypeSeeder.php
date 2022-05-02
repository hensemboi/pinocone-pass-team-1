<?php

namespace Database\Seeders;

use App\Models\VoucherType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VoucherType::create([
            'PK_voucherTypeCode' => 1,
            'name' => 'Flat Reduction',
            'description' => 'Reduces RM X from overall purchase'
        ]);

        VoucherType::create([
            'PK_voucherTypeCode' => 2,
            'name' => 'Percentage Reduction',
            'description' => 'X% off to overall purchase'
        ]);
    }
}
