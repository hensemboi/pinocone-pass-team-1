<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserDevice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDevice>
 */
class UserDeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PK_FK_userID' => $this->faker->randomElement(User::all()->pluck('PK_userID')->toArray()),
            'deviceNo' => $this->faker->numerify('device-######'),
            'deviceOS' =>  $this->faker->word,
            'deviceName' =>  $this->faker->word,
            'webBrowser' => $this->faker->word
        ];
    }
}
