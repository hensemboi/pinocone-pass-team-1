<?php

namespace App\Http\Controllers;

use App\Models\UserPaymentMethod;
use Illuminate\Http\Request;

class UserPaymentMethodController extends Controller
{
    public function fetchAll(Request $request)
    {
        return UserPaymentMethod::all();
    }

    public function fetchSpecificUser(Request $request, $id)
    {
        return UserPaymentMethod::where(
            [
                'PK_FK_userID' => $id
            ]
        )->get();
    }

    public function store(Request $request)
    {
        $userPaymentMethod = new UserPaymentMethod;
        $userPaymentMethod->PK_FK_userID = $request->userID;
        $userPaymentMethod->PK_FK_paymentCode = $request->paymentCode;
        $userPaymentMethod->cardNo = $request->cardNo;
        $userPaymentMethod->balance = $request->balance;
        $userPaymentMethod->save();

        return;
    }

    public function update(Request $request)
    {
        UserPaymentMethod::where(
            [
                'PK_FK_userID' => $request->userID
            ]
        )->update(
            [   
                'PK_FK_paymentCode' => $request->paymentCode,
                'cardNo' => $request->cardNo,
                'balance' => $request->balance
            ]
        );

        return;
    }
}
