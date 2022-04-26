<?php

namespace Database\Factories;

use App\Models\Category;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
    public function definition()
    {
        $id = IdGenerator::generate(['table' => 'menus', 'field' => 'PK_menuID', 'length' => 5, 'prefix' => date('02')]);
        $cat = Category::orderByRaw("RAND");
        
        return [
            'PK_menuID'=> $id,
            'menuName' => $this->faker->word(),
            'description' => $this->faker->word(),
            'price' => $this -> faker->randomFloat(2,1,100),
            'totalOrders' => $this -> faker ->numberBetween(0,2000),
            'FK_categoryCode' => $this->faker->numberBetween(1,3),
            'FK_cuisineCode' => $this->faker->numberBetween(1,3)
        ];
    }
}
