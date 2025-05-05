<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'id_comentario';
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function pagina()
    {
        return $this->belongsTo(Pagina::class, 'id_pagina');
    }

    public function subpagina()
    {
        return $this->belongsTo(Subpagina::class, 'id_subpagina');
    }

    public function parent()
    {
        return $this->belongsTo(Comentario::class, 'parent_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Comentario::class, 'parent_id');
    }
}
