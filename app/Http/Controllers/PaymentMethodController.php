<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function fetchAll(Request $request)
    {
        return PaymentMethod::all();
    }
}
