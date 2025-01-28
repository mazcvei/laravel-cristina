<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'grupo_id',  // Relación con el grupo
        'user_id',   // Relación con el usuario
        'texto',     // El contenido del mensaje
        'file',      // El archivo asociado al mensaje (opcional)
    ];

    // Relación belongsTo con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    // Relación belongsTo con User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
