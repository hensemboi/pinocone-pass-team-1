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
        Category::factory()->count(4)->create();

    //    Category::create([
    //         'PK_categoryCode' => 1,
    //         'name' => "Main Course",
    //         'description' => "Main Course Type is delicious"
    //     ]);

    //    Category::create([
    //         'PK_categoryCode' => 2,
    //         'name' => "Dessert",
    //         'description' => "Dessert Type is delicious"
    //     ]);

    //    Category::create([
    //         'PK_categoryCode' => 3,
    //         'name' => "Drinks",
    //         'description' => "Drinks Type is delicious"
    //     ]);
    }
}
