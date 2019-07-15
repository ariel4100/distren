<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    protected $fillable = [
        'cc', 'price', 'price_offer','order','product_id','offer','status'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
