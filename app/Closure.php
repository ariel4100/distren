<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    public function Product()
    {
        return $this->belongsToMany('App\Product');
    }
}
