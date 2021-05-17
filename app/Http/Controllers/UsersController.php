<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function get(Request $request)
    {
        $item = User::where('id',$request->id)->with('reservations','likes')->first();
        return response()->json([
            'message' => 'User got successfully',
            'data' => $item
        ], 200);
    }
}
