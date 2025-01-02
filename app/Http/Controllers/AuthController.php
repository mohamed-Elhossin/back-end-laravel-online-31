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
    public function register(Request $request) {}
    // Login Store
    public function login(Request $request) {}
    // logout
    public function logout() {}
}
