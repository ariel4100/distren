<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    protected $fillable = [
        'title', 'price', 'quantity','order','image'
    ];

    public function Product()
    {
        return $this->belongsToMany('App\Product');
    }
}
