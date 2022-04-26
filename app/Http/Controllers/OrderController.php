<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function fetchAll(Request $request)
    {
        return Order::all();
    }

    public function fetchSpecificUser(Request $request, $id)
    {
        return Order::where(
            [
                'FK_userID' => $id
            ]
        )->get();
    }
}
