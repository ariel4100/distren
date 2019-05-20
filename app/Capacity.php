<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    protected $fillable = [
        'cc', 'price', 'qty','order'
    ];

    public function Product()
    {
        return $this->belongsToMany('App\Product');
    }

    public function producto()
    {
        return $this->belongsTo('App\Product');
    }

    public function precio()
    {
        return $this->hasMany('App\Price');
    }
}
