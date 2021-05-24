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
        
        //↓元の文
        $items = Reservation::where('user_id', $request->user_id)->get();
        //↑元の文

        
        $data = [];
        foreach($items as $item) {
            $data[] = [
                'item' => $item,
                'shop' => $item->shop
            ];
        }

        return response()->json([
            'message' => 'Reservations got successfully',
            'data' => $data
        ], 200);
        
    }
}
