<?php

namespace App\Http\Controllers;

use App\Models\package;
use App\Models\TestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function basic()
    {
        $date = Carbon::now();
        $email = Auth::guard('mem')->user()->email;
        $id = Auth::guard('mem')->user()->id;
            $package = TestUser::find($id);
            $package->package = '1';
            $package->expires_at = date('m-d-Y', strtotime($date. ' + 30 days'));
            $package->save();
            if ($this->basicEmail($email)) {
                return redirect()->back()->with('message','Basic Membership Activated Successfully!');
            }

    }
    public function basicEmail($email)
    {
        Mail::to($email)->send(new \App\Mail\Basic);
        return redirect()->back()->with('message','Basic Membership Activated Successfully!');
    }
    public function standard()
    {
        $date = Carbon::now();
        $email = Auth::guard('mem')->user()->email;
        $id = Auth::guard('mem')->user()->id;
            $package = TestUser::find($id);
            $package->package = '2';
            $package->expires_at = date('m-d-Y', strtotime($date. ' + 30 days'));
            $package->save();
            if ($this->basicstandard($email)) {
                return redirect()->back()->with('message','Standard Membership Activated Successfully!');
            }

    }
    public function basicstandard($email)
    {
        Mail::to($email)->send(new \App\Mail\Standard);
        return redirect()->back()->with('message','Basic Membership Activated Successfully!');
    }
    public function premium()
    {
        $date = Carbon::now();
        $email = Auth::guard('mem')->user()->email;
        $id = Auth::guard('mem')->user()->id;
            $package = TestUser::find($id);
            $package->package = '3';
            $package->expires_at = date('m-d-Y', strtotime($date. ' + 30 days'));
            $package->save();
            if ($this->basicpremium($email)) {
                return redirect()->back()->with('message','Premium Membership Activated Successfully!');
            }

    }
    public function basicpremium($email)
    {
        Mail::to($email)->send(new \App\Mail\Premium);
        return redirect()->back()->with('message','Premium Membership Activated Successfully!');
    }
    public function basicc()
    {
        return view('membership.basic');
    }
    public function standardd()
    {
        return view('membership.standard');
    }
    public function premiumm()
    {
        return view('membership.premium');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(package $package)
    {
        //
    }
}
