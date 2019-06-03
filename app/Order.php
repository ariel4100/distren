<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name_category', 'name_product', 'cc','price_cc','quantity_cc','name_closure','price_closure','closure_cc','status','transaction_id','client_id'
    ];

    public function client() {
        return $this->belongsTo('App\Client');
    }
}
