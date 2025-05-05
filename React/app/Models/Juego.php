<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos';
    protected $primaryKey = 'id_juego';
    public $timestamps = false;

    public function paginas()
    {
        return $this->hasMany(Pagina::class, 'id_juego');
    }

    public function subpaginas()
    {
        return $this->hasMany(Subpagina::class, 'id_juego');
    }

    public function objeto()
    {
        return $this->hasOne(Objeto::class, 'id_juego');
    }
}

