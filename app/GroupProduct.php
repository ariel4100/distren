<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    protected $fillable = [
        'code', 'image', 'title','text','order','category_id','subcategory_id'
    ];


    public function category() {
        return $this->belongsTo('App\Category');
    }


    public function subcategory() {
        return $this->belongsTo('App\Subcategory');
    }


    public function product() {
        return $this->hasMany('App\Product');
    }
}
