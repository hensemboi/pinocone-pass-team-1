<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function fetchAll(){
<<<<<<< HEAD
        return Order::All();
    }
=======
        return Order::all();
    }

>>>>>>> origin/pinocone-requestDashboard
}
