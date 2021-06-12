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
        //'user_id',
        'url'
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
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
