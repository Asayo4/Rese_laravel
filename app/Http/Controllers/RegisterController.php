<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $param = User::register($request);
        return response()->json([
            'message' => 'User created successfully',
            'data' => $param
        ], 201);
    }
}
