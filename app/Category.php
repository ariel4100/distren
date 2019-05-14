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
}
