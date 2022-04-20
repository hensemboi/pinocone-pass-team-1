<?php

namespace Database\Factories;

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
        $cat = Category::orderByRaw("RAND")
        return [
            'PK_menuID'=> $id,
            'menuName' => $this->faker->slug(),
            'description' => $this->faker->sentence(mt_rand(3,10)),
            'price' => $this -> faker->randomFloat(2, 1,100),
            'totalOrders' => $this -> faker ->numberBetween(0,2000),
            'FK_categoryCode' => $this->faker->nummberBetw
            'FK_cuisineCode' 
            'FK_categoryCode', 'FK_categoryMenu')->references('pk_categorycode')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            'FK_cuisineCode', 'FK_cuisineTypeMenu')->references('pk_cuisinecode')->on('cuisine_types')->onDelete('cascade')->onUpdate('cascade');
        
        ];
    }
}
