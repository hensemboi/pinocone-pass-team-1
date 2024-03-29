<?php

namespace Database\Seeders;

use App\Models\UserDevice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDevice::factory()->count(20)->create();
    }
}
