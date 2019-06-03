<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'shipping', 'payment', 'total',
    ];

    public function transaction() {
        return $this->hasOne('App\Client');
    }
}
