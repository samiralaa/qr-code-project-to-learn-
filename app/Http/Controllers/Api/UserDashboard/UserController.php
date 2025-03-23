<?php

namespace App\Http\Controllers\Api\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'User dashboard data'
        ], 200);
    }
}
