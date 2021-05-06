<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $hashed_password = Hash::make($request->password);
        $param = [
            "user_name" => $request->user_name,
            "email" => $request->email,
            "password" => $hashed_password,
        ];
        User::create($param);
        return response()->json([
            'message' => 'User created successfully',
            'data' => $param
        ], 201);
    }
}
