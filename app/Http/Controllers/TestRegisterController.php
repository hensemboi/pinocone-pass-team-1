<?php

namespace App\Http\Controllers;

use App\Models\TestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestRegisterController extends Controller
{
    public function index(){
        return view('testregister.index',[
    
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:test_users',
            'email' => 'required|email:dns|unique:test_users',
            'password' => 'required|min:8|max:255'
        ]);
            
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        TestUser::create($validatedData);
        
        return redirect('/')->with('success', 'Registration successful! You may login now.');
    }
}
