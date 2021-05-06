<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'shop_name',
        'area_name',
        'genre_name',
        'detail',
        'likes'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
