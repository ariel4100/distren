<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'price','quantity','product_id','capacity_id','offer_price'
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function capacity() {
        return $this->belongsTo('App\Capacity');
    }
}
