<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Go TO Page Register
    public function  Show_register()
    {
        return view("auth.register");
    }
    //Go TO page login
    public function  Show_login()
    {
        return view("auth.login");
    }

    // Register Store
    public function register(Request $request)
    {
        $request->validate([
            'name' => "required|string",
            "email" => "required|string|email|unique:users,email",
            "password" => "required|confirmed"
        ]);


        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);


        return redirect()->route("login")->with("success", "Create Account Successfully");
    }
    // Login Store
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|string",
            "password" => "required|string"
        ]);


        if (Auth::attempt($request->only("email", "password"))) {
            $request->session()->regenerate();
            return redirect()->route("home");
        }

        return redirect()->back()->with("fail", "Wrong Email OR Password");
    }
    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
