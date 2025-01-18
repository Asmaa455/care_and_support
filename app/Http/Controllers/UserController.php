<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string',
            'second_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ],201);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password')))
        return response()->json([
            'message' => 'invalid email or password'
        ],401);

        $user = User::where('email',$request->email)->firstOrFail();
        $token=$user->createToken('auth_Token')->plainTextToken;
        return response()->json([
            'message' => 'login successfully',
            'user' => $user,
            'token' => $token
        ],201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'logout successfully'
        ]);
    }
}
