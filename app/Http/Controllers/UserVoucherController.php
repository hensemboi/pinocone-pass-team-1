<?php

namespace App\Http\Controllers;

use App\Models\UserVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function fetchVoucherInformation($id)
    {
        $vouchersOwned = DB::table('user_vouchers')
                            ->join('vouchers', 'user_vouchers.PK_FK_voucherID', '=', 'vouchers.PK_voucherID')
                            ->select('user_vouchers.*', 'vouchers.name', 'vouchers.expiryDate')
                            ->where(['PK_FK_userID' => $id])
                            ->get();

        return $vouchersOwned;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserVoucher::create([
            'PK_FK_userID' => $request->PK_FK_userID,
            'PK_FK_voucherID' => $request->PK_FK_voucherID
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(UserVoucher $userVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVoucher $userVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserVoucher $userVoucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVoucher $userVoucher)
    {
        //
    }
}
