<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Attempt login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login credentials.'
            ], 401);
        }

        // Retrieve authenticated user
        $user = Auth::user();

        // Generate access token
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        // Revoke current user token
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ], 200);
    }
}
