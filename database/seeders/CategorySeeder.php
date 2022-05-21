<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::create([
            'PK_categoryCode' => 'CA01',
            'name' => "Warm",
            'description' => "Main Course Type is delicious"
        ]);

       Category::create([
            'PK_categoryCode' => 'CA02',
            'name' => "Cold",
            'description' => "Dessert Type is delicious"
        ]);
    }
}
