<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Staff;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Pinopay;
use App\Models\Voucher;
use App\Models\Category;
use App\Models\Division;
use App\Models\Feedback;
use App\Models\Position;
use App\Models\TestUser;
use App\Models\Membership;
use App\Models\UserDevice;
use App\Models\CuisineType;
use App\Models\OrderedMenu;
use App\Models\SubCategory;
use App\Models\UserVoucher;
use App\Models\VoucherType;
use App\Models\PaymentMethod;
use App\Models\StaffInCharge;
use App\Models\MeansOfDelivery;
use Illuminate\Database\Seeder;
use App\Models\UserPaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Strong Enttity
        User::factory()->count(20)->create();
        TestUser::factory()->count(1)->create();
        Category::factory()->count(4)->create();
        CuisineType::factory()->count(3)->create();
        Division::factory()->count(3)->create();
        PaymentMethod::factory()->count(3)->create();
        MeansOfDelivery::factory()->count(3)->create();
        // SubCategory::factory()->count(1)->create();
        VoucherType::factory()->count(3)->create();

        Voucher::factory()->count(5)->create();
        Position::factory()->count(4)->create();
        Address::factory()->count(30)->create();
        Menu::factory()->count(50)->create();
        Pinopay::factory()->count(10)->create();
        UserDevice::factory()->count(25)->create();
        UserPaymentMethod::factory()->count(1)->create();
        Membership::factory()->count(5)->create();
        UserVoucher::factory()->count(1)->create();

        Staff::factory()->count(20)->create();
        Order::factory()->count(50)->create();

        Admin::factory()->count(1)->create();
        StaffInCharge::factory()->count(10)->create();
        Feedback::factory()->count(10)->create();
        OrderedMenu::factory()->count(10)->create();
    }
}
