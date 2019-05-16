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
}
