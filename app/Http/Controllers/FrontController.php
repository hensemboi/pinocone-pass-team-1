<?php

namespace App\Http\Controllers;

use App\Models\Front;
use App\Models\TestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function email()
    {
        return view('emails.basic');
    }
    public function index()
    {
        return view('membership.index');
    }
    public function login()
    {
        return view('membership.login');
    }
    public function register()
    {
        return view('membership.register');
    }
    public function contact()
    {
        return view('membership.contact');
    }
    public function profile()
    {
        return view('membership.profile');
    }
    public function postregister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:test_users',
            'password' => 'required|min:6|max:250',
        ]);
        $contact = new TestUser();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->password = Hash::make($request->password);
        $contact->save();
        return redirect()->back()->with('message','Account Created Successfully!');
    }
    public function postprofile(Request $request)
    {
        $id = Auth::guard('mem')->user()->id;
        $request->validate([
            'name' => 'required|max:250',
        ]);
        $contact = TestUser::find($id);
        $contact->name = $request->name;
        $contact->save();
        return redirect()->back()->with('message','Account Updated Successfully!');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|max:250',
            'password' => 'required|max:250',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('mem')->attempt($credentials)) {
            return redirect('/membership/index')->with('message','Welcome Back ' . Auth::guard('mem')->user()->name );
        }
        return redirect()->back()->with('error', 'Email or Password is Invalid!');
    }
    public function logout()
    {
        Auth::guard('mem')->logout();
        Session::flush();
        return redirect('/membership/index');
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
     * @param  \App\Models\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function show(Front $front)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function edit(Front $front)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Front $front)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function destroy(Front $front)
    {
        //
    }
}
