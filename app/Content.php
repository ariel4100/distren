<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'image','order','section','text','type','icon','destacado','video','ficha'
    ];

    public function scopeSeccionTipo($query, $seccion, $tipo) {
        return $query->where(['section' => $seccion, 'type' => $tipo]);
    }
}
