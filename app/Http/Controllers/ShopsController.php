<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function get(Request $request)
    {
        $shop = Shop::where('shops.id', $request->id)->with('area:id,area_name', 'genre:id,genre_name', 'likes')->first();
        /*$likes = Like::where('shop_id', $request->id)->get();
        $likes_length = count($likes);*/

        return response()->json([
            'message' => 'Shop got successfully',
            'data' => [$shop/*, $likes_length*/]
        ],200);
    }
    public function getAll()
    {
        $shops = Shop::with('area:id,area_name','genre:id,genre_name','likes')->get();

        return response()->json([
            'message' => 'Shops got successfully',
            'data' => [$shops]
        ], 200);
    }
}
