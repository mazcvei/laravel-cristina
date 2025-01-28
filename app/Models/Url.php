<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    //

    protected $fillable = [
        'contenido_id',
        'url',
        'descripcion_url',
        'imagen_url',
    ];

    public function contenido()
    {
    return $this->belongsTo(Contenido::class);
    }
}
