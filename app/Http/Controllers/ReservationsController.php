<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function post(Request $request)
    {
        $param = Reservation::reservationPost($request);
        return response()->json([
            'message' => 'Reservation created successfully',
            'data' => $param
        ], 201);
    }
    public function delete(Request $request)
    {
        Reservation::where('id', $request->id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Reservation deleted successfully'
        ], 200);
    }
    public function get(Request $request)
    {
        $items = Reservation::where('user_id', $request->user_id)->get();

        return response()->json([
            'message' => 'Reservations got successfully',
            'data' => $items,
        ], 200);
        $items->shop->shop_name;
    }
}
