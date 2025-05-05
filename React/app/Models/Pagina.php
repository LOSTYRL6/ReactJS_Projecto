<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pagina extends Model
{
    use HasFactory;

    protected $table = 'paginas';
    protected $primaryKey = 'id_pagina';
    public $timestamps = false;


    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juego');
    }

    public function subpaginas()
    {
        return $this->hasMany(Subpagina::class, 'id_pagina');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_pagina');
    }
}

