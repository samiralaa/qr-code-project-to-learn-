<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\RegisterService;
use App\Http\Resources\User\UserCollection;
use App\Http\Requests\Auth\Register\RegisterRequest;

class RegisterController extends Controller
{
    public $authService;
    public function __construct(RegisterService $authService)
    {
        $this->authService = $authService;
    }
    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->validated();

            // Create user and return it
            $user = $this->authService->createUser($validated);
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'message' => 'User registered successfully.',
                'token' => $token,
                'user' => $user // Optional: Return user details
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'User registration failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
    return new UserCollection($this->authService->allusers());
        // $data = $this->authService->allusers();
        // return response()->json([
        //     'success' => true,
        //     'data' => $data
        // ]);
    }
}
