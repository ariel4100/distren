<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'surname', 'email','phone','address','province','location','iva','transaction_id'
    ];

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

    public function order() {
        return $this->hasMany('App\Order');
    }
}
