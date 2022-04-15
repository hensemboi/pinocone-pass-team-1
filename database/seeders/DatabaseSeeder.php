<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TestUser;
use App\Models\Address;
use App\Models\Category;
use App\Models\CuisineType;
use App\Models\Division;
use App\Models\MeansOfDelivery;
use App\Models\Membership;
use App\Models\PaymentMethod;
use App\Models\Pinopay;
use App\Models\SubCategory;
use App\Models\UserDevice;
use App\Models\VoucherType;
use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->create();
        TestUser::factory()->count(20)->create();
        Address::factory()->count(20)->create();
        Category::factory()->count(20)->create();
        CuisineType::factory()->count(20)->create();
        Division::factory()->count(20)->create();
        MeansOfDelivery::factory()->count(20)->create();
        Membership::factory()->count(20)->create();
        PaymentMethod::factory()->count(20)->create();
        Pinopay::factory()->count(20)->create();
        SubCategory::factory()->count(20)->create();
        UserDevice::factory()->count(20)->create();
        VoucherType::factory()->count(20)->create();
        Voucher::factory()->count(20)->create();
    }
}
