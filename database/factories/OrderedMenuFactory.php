<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderedMenu>
 */
class OrderedMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_FK_transactionID'=>$this->faker->unique()->randomElement(Order::all()->pluck('PK_transactionID')->toArray()),
            'PK_FK_menuID'=>$this->faker->randomElement(Menu::all()->pluck('PK_menuID')->toArray()),
            'quantity'=>$this->faker->randomDigitNotNull(),
            'extraNote'=>$this->faker->sentence(),
            'itemsPrice'=>$this->faker->randomFloat(2, 1, 100)
        ];
    }
}
