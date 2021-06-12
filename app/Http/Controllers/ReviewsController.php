<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function post(Request $request)
    {
        $param = Reviews::reviewPost($request);
        return response()->json([
            'message' => 'Review posted succsessfully',
            'data' => $param
        ], 201);
    }
    public function delete(Request $request)
    {
        Reviews::where('id', $request->id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Review deleted successfully'
        ], 200);
    }
    public function put(Request $request)
    {
        $param = Reviews::reviewPut($request);
        return response()->json([
            'message' => 'Reviwe updated successfully',
            'data' => $param
        ], 200);
    }
    public function get(Request $request)
    {
        $items = Reviews::where('shop_id', $request->shop_id)->get();

        $data = [];
        foreach($items as $item) {
            $data [] = [
                'item' => $item,
                'user' => $item->user
            ];
        }

        return response()->json([
            'message' => 'Reviews got successfully',
            'data' => $data
        ], 200);
    }
}
