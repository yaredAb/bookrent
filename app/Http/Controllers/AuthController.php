<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
    //Book owners signup process
    public function Ow_signup(Request $request){

        //validation
        $field = $request->validate([
            'email'=> ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
            'location' => ['required', 'max:255'],
            'phone_number' => ['required', 'min:10']
        ]);

        //registering
        $field['privilage'] = 'owner';
        $field['status'] = 'not approved';

        //registering
        $user = User::create($field);

        //Login
        Auth::login($user);

        //redirect
        return redirect()->route('owner-dashboard');
    }

    //Admin Signup process
    public function Ad_signup(Request $request)
    {
        //validation
        $field = $request->validate([
                'email' => ['required', 'max:255', 'email', 'unique:users'],
                'password' => ['required', 'min:3', 'confirmed'],
                'location' => ['required', 'max:255'],
                'phone_number' => ['required', 'min:10']
            ]);
        $field['privilage'] = 'admin';

        //registering
        $user = User::create($field);

        //Login
        Auth::login($user);

        //redirect
        return redirect()->route('admin-dashboard');
    }

    //Book owners login process
    public function Ow_login(Request $request){
        //validation
        $field = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);
        $field['privilage'] = "owner";

        //Try to log in
        if(Auth::attempt($field, $request->remember)){
            return redirect()-> route('owner-dashboard');
        }
        else{
            return back()->withErrors([
                'failed'=>'Incorrect email or password'
            ]);
        }
    }

    //Admin login process
    public function Ad_login(Request $request)
    {
        //validation
        $field = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);
        $field['privilage'] = "admin";

        //Try to log in
        if (Auth::attempt($field, $request->remember)) {
            return redirect()->route('admin-dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'Incorrect email or password'
            ]);
        }
    }

    public function owner_login_page(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('Auth.Ow_login');
    }

    public function admin_login_page(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('Auth.Ad_login');
    }
    //Logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
