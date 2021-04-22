<?php

namespace App\Http\Controllers;

use App\Models\Rese;
use Illuminate\Http\Request;

class ResesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Rese::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = new Rese;
        $items->user_id = $request->user_id;
        $items->password = $request->password;
        $items->email = $request->email;
        $items->shop_id = $request->shop_id;
        $items->date = $request->date;
        $items->time = $request->time;
        $items->num_of_users = $request->num_of_users;
        $items->save();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rese  $rese
     * @return \Illuminate\Http\Response
     */
    public function show(Rese $rese)
    {
        $item = Rese::where('id', $rese->id)->first();
        if ($item) {
            return response()->json([
                'message' => 'OK',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rese  $rese
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rese $rese)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rese  $rese
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rese $rese)
    {
        //
    }
}
