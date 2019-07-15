<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [

        'image' => 'array',

    ];


    protected $fillable = [
        'code', 'image', 'title','subtitle','text','featured','category_id','order','offer','subcategory_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function subcategory() {
        return $this->belongsToMany('App\Subcategory','subcategory_product');
    }

    public function termination()
    {
        return $this->belongsToMany('App\Termination');
    }
    public function closure()
    {
        return $this->belongsToMany('App\Closure');
    }
    public function capacity()
    {
        return $this->hasMany('App\Capacity');
    }

}
