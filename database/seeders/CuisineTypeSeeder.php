<?php

namespace Database\Seeders;

use App\Models\CuisineType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CuisineType::factory()->count(20)->create();
    }
}
