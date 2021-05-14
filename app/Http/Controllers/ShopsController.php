<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function get(Request $request)
    {
        $shop = Shop::where('shops.id', $request->id)->with('area:id,area_name', 'genre:id,genre_name', 'likes')->first();

        return response()->json([
            'message' => 'Shop got successfully',
            'data' => $shop
        ],200);
    }
    public function getAll()
    {
        $shops = Shop::with('area:id,area_name', 'genre:id,genre_name', 'likes')->get();

        return response()->json([
            'message' => 'Shops got successfully',
            'data' => $shops
        ], 200);
    }
}
