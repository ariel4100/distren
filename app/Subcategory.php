<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'code', 'image', 'title','text','order',
    ];

    public function Product()
    {
        return $this->belongsToMany('App\Product','subcategory_product');
    }
}
