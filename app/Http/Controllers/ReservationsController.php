<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "date" => $request->date,
            "time" => $request->time,
            "num_of_users" => $request->num_of_users,
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('reservations')->insert($param);
        return response()->json([
            'message' => 'Reserved successfully',
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        DB::table('reservations')->where('id', $request->id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Reservations deleted successfully'
        ], 200);
    }
    public function get(Request $request)
    {
        if ($request->has('email')) {
            $items = DB::table('reservations')->where('email', $request->email)->get();
            return response()->json([
                'message' => 'Reservation got successfully',
                'data' => $items
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
}
