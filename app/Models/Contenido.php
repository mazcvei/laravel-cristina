<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    //

    protected $fillable = [
        'tablero_id',
        'titulo_contenido',
    ];
    
    public function tablero()
    {
    return $this->belongsTo(Tablero::class, 'tablero_id');
    }

    public function urls(){
        return $this->hasMany(Url::class);
    }
}
