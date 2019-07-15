<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'code', 'image', 'title','text','order','category_id'
    ];


    public function category() {
        return $this->belongsTo('App\Category');
    }
}
