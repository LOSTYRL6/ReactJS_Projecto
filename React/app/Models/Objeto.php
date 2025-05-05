<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Objeto extends Model
{
    use HasFactory;
    protected $table = 'objetos';
    protected $primaryKey = 'id_objeto';
    public $timestamps = false;

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juego');
    }
}
