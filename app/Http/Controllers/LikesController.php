<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function post(Request $request)
    {
        $param = Like::likePost($request);
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

        $data = [];
        foreach ($likes as $like) {
            $data[] = [
                'item' => $like,
                'shop' => $like->shop
            ];
        }

        return response()->json([
            'message' => 'Likes got successfully',
            'data' => $data
        ], 200);
    }
}
