<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tablero extends Model
{
    //
    public function user()
    {
    return $this->belongsTo(User::class);  // Definir que un tablero pertenece a un usuario
    }

    public function contenidos(){
        return $this->hasMany(Contenido::class, 'tablero_id');
    }

    

}
