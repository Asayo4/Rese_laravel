<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function post(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $is_check = Hash::check($request->password, $user->password);
        if ($is_check) {
            return response()->json(['auth' => true, 'id' => $user->id], 200);
        } else {
            return response()->json(['auth' => false], 401);
        }
    }
}
