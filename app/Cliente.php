<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id_cliente';
    protected $fillable = ['nombre', 'apellido','telefono','correo','estado','municipio','direccion','estatus'];
}
