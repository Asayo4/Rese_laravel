<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikesController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('likes')->insert($param);
        return response()->json([
            'message' => 'Like created successfully',
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        DB::table('likes')->where('shop_id', $request->shop_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully'
        ], 200);
    }
    public function get(Request $request)
    {
        $items = DB::table('likes')->where('user_id', $request->user_id)->get();
        return response()->json([
            'message' => 'Like got successfully',
            'data' => $items
        ], 200);
    }
}
