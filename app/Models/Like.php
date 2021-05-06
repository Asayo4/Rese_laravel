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
}
