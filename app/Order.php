<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name_category', 'name_product', 'cc','price_cc','quantity_cc','name_closure','price_closure','quantity_closure','status','transaction_id','client_id','price_offer','name_termination','price_termination','quantity_termination'
    ];

    public function client() {
        return $this->belongsTo('App\Client');
    }
}
