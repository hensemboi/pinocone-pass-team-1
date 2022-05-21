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
        CuisineType::create([
            'PK_cuisineCode' => 'CT01',
            'name' => "Malaysian",
            'description' => "Malaysian Type is delicious"
        ]);

        CuisineType::create([
            'PK_cuisineCode' => 'CT02',
            'name' => "Chinese",
            'description' => "Chinese Type is delicious"
        ]);

        CuisineType::create([
            'PK_cuisineCode' => 'CT03',
            'name' => "Indian",
            'description' => "Indian Type is delicious"
        ]);
    }
}
