<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
    public static function reviewPost($request)
    {
        $param = [
            'shop_id' => $request->shop_id,
            'user_id' => $request->user_id,
            'review_content' => $request->reviwe_content,
            'num_of_stars' => $request->num_of_stars
        ];
        $reviewPost = Reviews::create($param);
        return $reviewPost;
    }
    public static function reviewPut($request)
    {
        $param = [
            'user_id' => $request->user_id,
            'review_content' => $request->reviwe_content,
            'num_of_stars' => $request->num_of_stars
        ];
        $reviewPut = Reviews::where('id', $request->id)->where('user_id', $request->user_id)->update($param);
        return $reviewPut;
    }
}