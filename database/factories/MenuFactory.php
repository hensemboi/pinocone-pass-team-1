<?php

namespace Database\Factories;

use App\Models\Category;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\CuisineType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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

        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'PK_menuID'=> $this->faker->unique()->numerify('ME########'),
            'menuName' => $this->faker->foodName(),
            'description' => $this->faker->sentence(mt_rand(3,10)),
            'price' => $this -> faker->randomFloat(2, 1,100),
            'totalOrders' => $this -> faker ->numberBetween(0,1500),
            'FK_categoryCode' => $this->faker->randomElement(Category::all()->pluck('PK_categoryCode')->toArray()),
            'FK_cuisineCode' =>$this->faker->randomElement(CuisineType::all()->pluck('PK_cuisineCode')->toArray()),
        ];
    }
}
