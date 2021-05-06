<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function post(Request $request)
    {
        $param = [
            "date" => $request->date,
            "time" => $request->time,
            "num_of_users" => $request->num_of_users,
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
        ];
        Reservation::create($param);
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
            'data' => $items
        ], 200);
    }
}
