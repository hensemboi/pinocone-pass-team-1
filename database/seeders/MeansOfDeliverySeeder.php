<?php

namespace Database\Seeders;

use App\Models\MeansOfDelivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeansOfDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeansOfDelivery::factory()->count(20)->create();
    }
}
