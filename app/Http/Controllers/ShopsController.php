<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function get(Request $request)
    {
        $items = DB::table('shops')-> where('id', $request->id)->get();
        return response()->json([
            'message' => 'Shop got successfully',
            'data' => $items
        ],200);
    }
}
