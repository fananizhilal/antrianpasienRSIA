<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
 public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = new User();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
 
        $user->save();
 
        return redirect('/login')->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('auth.login');
    }
 
    public function loginPost(Request $request)
    {

        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
            
        ];
 
        if (Auth::attempt($credetials)){
            if (Auth::user()->roles == 'pasien') {
            return redirect('/home');
        }   elseif (Auth::user()->roles == 'admin'){
            return redirect('/admin');
        }
    } else {
        return back()->withErrors([
            'email' => 'Data tidak ditemukan. Harap periksa inputan Anda dan coba lagi.',
        ])->onlyInput('email');
    }
}
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}

 

