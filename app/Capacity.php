<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    public function Product()
    {
        return $this->belongsToMany('App\Product');
    }
}
