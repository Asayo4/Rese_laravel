<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function post(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
        ];
        Like::create($param);
        return response()->json([
            'message' => 'Like created successfully',
            'data' => $param
        ], 201);
    }
    public function delete(Request $request)
    {
        Like::where('shop_id', $request->shop_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully'
        ], 200);
    }
    public function get(Request $request)
    {
        $likes = Like::where('user_id', $request->user_id)->get();
        return response()->json([
            'message' => 'Like got successfully',
            'data' => $likes
        ], 200);
    }
}
