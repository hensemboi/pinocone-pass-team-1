<?php

namespace App\Http\Controllers;

use App\Models\Pinopay;
use Illuminate\Http\Request;

class PinopayController extends Controller
{
    public function fetchAll(Request $request)
    {
        return Pinopay::all();
    }

    public function fetchSpecificUser(Request $request, $id)
    {
        return Pinopay::where(
            [
                'FK_userID' => $id
            ]
        )->get();
    }

    public function store(Request $request)
    {
        $pinopay = new Pinopay;
        $pinopay->FK_userID = $request->userID;
        $pinopay->balance = $request->balance;
        $pinopay->PIN = $request->PIN;
        $pinopay->save();

        return;
    }
    
    public function update(Request $request, $id)
    {
        Pinopay::where(
            [
                'FK_userID' => $id
            ]
        )->update(
            [
                'balance' => $request->balance,
            ]
        );

        return;
    }
}
