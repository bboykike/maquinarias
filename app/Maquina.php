<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $primaryKey = 'id_maquina';
    protected $fillable = ['modelo', 'horometro', 'anio', 'tipo', 'estatus'];
}
