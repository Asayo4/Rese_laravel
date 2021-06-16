<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function get(Request $request)
    {
        $shop = Shop::where('shops.id', $request->id)->with('area:id,area_name', 'genre:id,genre_name', 'reviews:id,shop_id,num_od_stars')->get();

        return response()->json([
            'message' => 'Shop got successfully',
            'data' => $shop
        ],200);
    }
    public function getAll()
    {
        $shops = Shop::with('area:id,area_name', 'genre:id,genre_name', 'likes', 'reviews:id,shop_id,num_of_stars')->get();

        return response()->json([
            'message' => 'Shops got successfully',
            'data' => $shops
        ], 200);
    }
}
