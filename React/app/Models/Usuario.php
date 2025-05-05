<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_usuario');
    }
}
