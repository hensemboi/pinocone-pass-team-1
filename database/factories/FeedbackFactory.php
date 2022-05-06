<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
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
            'PK_FK_userID' =>$this->faker->randomElement(Order::all()->pluck('FK_userID')->toArray()),
            'textFeedback'=>$this->faker->sentence(6),
            'menuRating'=>$this->faker->numberBetween(0,5),
            'deliveryRating'=>$this->faker->numberBetween(0,5),
            'serviceRating'=>$this->faker->numberBetween(0,5),
        ];
    }
}
