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
    public function shopGet(Request $request)
    {
        $items = Reviews::where('shop_id', $request->shop_id)->with('user')->get();

        return response()->json([
            'message' => 'Reviews got successfully',
            'data' => $items
        ], 200);
    }
    public function userGet(Request $request)
    {
        $items = Reviews::where('user_id', $request->user_id)->get();

        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'item' => $item,
                'shop' => $item->shop
            ];
        }

        return response()->json([
            'message' => 'Reviews got successfully',
            'data' => $data
        ], 200);
    }
}
