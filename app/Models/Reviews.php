<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = [
        'shop_id',
        'user_id',
        'user_name',
        'review_content',
        'num_of_stars',
        'nickname'
    ];
    protected $table = 'reviews';
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function reviewPost($request)
    {
        $param = [
            'shop_id' => $request->shop_id,
            'user_id' => $request->user_id,
            'review_content' => $request->review_content,
            'num_of_stars' => $request->num_of_stars,
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