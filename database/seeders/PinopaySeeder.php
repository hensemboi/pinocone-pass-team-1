<?php

namespace Database\Seeders;

use App\Models\Pinopay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PinopaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pinopay::factory()->count(20)->create();
    }
}
