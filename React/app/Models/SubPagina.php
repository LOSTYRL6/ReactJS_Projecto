<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subpagina extends Model
{
    use HasFactory;
    protected $table = 'subpaginas';
    protected $primaryKey = 'id_subpagina';
    public $timestamps = false;

    public function pagina()
    {
        return $this->belongsTo(Pagina::class, 'id_pagina');
    }

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juego');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_subpagina');
    }
}
