<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'price','quantity'
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function capacity() {
        return $this->belongsTo('App\Capacity');
    }
}
