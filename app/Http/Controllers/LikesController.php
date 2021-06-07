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
        Like::where('id', $request->id)->where('user_id', $request->user_id)->delete();
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
                'shops' => $like->shop->with('area:id,area_name','genre:id,genre_name')->where('id', $like->shop_id)->get(),
                'item' => $like,
            ];
        }

        return response()->json([
            'message' => 'Likes got successfully',
            'data' => $data
        ], 200);
    }
}
