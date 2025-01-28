<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 'foto_grupo', 'creador_id',// Solo el nombre del grupo
    ];

    // Relación hasMany con UsuariosGrupo
    public function usuariosGrupos()
    {
        return $this->hasMany(UsuariosGrupo::class, 'grupo_id');
    }


    public function usuarioCreador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }


    public function usuarios()
    {
    return $this->belongsToMany(User::class, 'usuarios_grupos', 'grupo_id', 'user_id');
    }

    public function mensajes(){
        return $this->hasMany(Mensaje::class, 'grupo_id', 'id');
    } 



}
