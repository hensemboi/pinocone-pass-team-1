<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function fetchAll(){
        return Order::with(['category', 'category.menu'])->get();
    }


}
