<?php

namespace App\Http\Controllers\APIs;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //   regsiter
    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|confirmed"
        ]);


        $user = User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => bcrypt($data['password'])
        ]);


        // Token
        $token = $user->createToken("user_token")->plainTextToken;


        $response = [
            "status" => 200,
            "data" => $user,
            "token" => $token,
            "message" => "create User Successfully"
        ];

        return response($response, 200);
    }

    public function login(Request $request)
    {

        $data = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);


        $user = User::where("email", "=", $data['email'])->first();


        if (!$user) {
            $response = [
                "status" => 400,
                "message" => "Email Dosn't Exist "
            ];
        } else {
            if (Hash::check($data['password'], $user->password)) {
                $token = $user->createToken("user_token")->plainTextToken;
                $response = [
                    "status" => 200,
                    "data" => $user,
                    "token" =>  $token,
                    "message" => "create User Successfully"
                ];
            } else {
                $response = [
                    "status" => 400,
                    "message" => "Password Wrong"
                ];
            }
        }






        return response($response, 200);
    }

    // Private Route
    public function logout()
    {
        Auth::user()->tokens()->delete();


        $response = [
            "status" => 200,
            "message" => "Logout Successfully"
        ];

        return response($response, 200);
    }
}
