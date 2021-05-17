<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id'
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public static function likePost($request)
    {
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
        ];
        $like = Like::create($param);
        return $like;
    }
}
