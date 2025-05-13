<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            \Log::error("User not found: " . $request->email);
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            \Log::error("Password mismatch for user: " . $request->email);
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('MyAppToken')->plainTextToken;

        return response()->json([
            'message' => 'Logged in successfully',
            'token' => $token
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'gender' => 'required|in:male,female,other',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

}
