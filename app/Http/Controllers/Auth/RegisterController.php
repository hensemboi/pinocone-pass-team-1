<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, []);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request){
        $id = IdGenerator::generate(['table' => 'users', 'field' => 'PK_userID', 'length' => 9, 'prefix' => date('ym')]);
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:25|unique:users',
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'dateOfBirth' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => ['required', 'confirmed', Password::min(10)],
        ]);
        
        $validatedData['PK_userID'] = $id;
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        auth()->login($user);
    }
}
