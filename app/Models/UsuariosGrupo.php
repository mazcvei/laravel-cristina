<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuariosGrupo extends Model
{
    //
    protected $fillable = [
        'user_id',
        'grupo_id',
    ];

    // Relación hacia User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relación hacia Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
