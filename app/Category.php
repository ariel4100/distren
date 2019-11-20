<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'code', 'image', 'title','text','order',
    ];

    public function product() {
        return $this->hasMany('App\Product');
    }

    public function subcategory() {
        return $this->hasMany('App\Subcategory');
    }

    public function group_product() {
//        dd($this->hasMany('App\GroupProduct')->orderBy('order'));
        return $this->hasMany('App\GroupProduct')->orderBy('order');
    }
}
