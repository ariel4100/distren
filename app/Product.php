<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'image', 'title','subtitle','text','featured','category_id','order',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function closure()
    {
        return $this->belongsToMany('App\Closure');
    }
    public function capacity()
    {
        return $this->belongsToMany('App\Capacity');
    }
}
