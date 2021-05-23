<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date',
        'time',
        'num_of_users',
        'user_id',
        'shop_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class)->withDefault();
    }
    public static function reservationPost($request)
    {
        $param = [
            "date" => $request->date,
            "time" => $request->time,
            "num_of_users" => $request->num_of_users,
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
        ];
        $reservationPost = Reservation::create($param);
        return $reservationPost;
    }
}
