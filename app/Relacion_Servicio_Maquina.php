<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relacion_Servicio_Maquina extends Model
{
    protected $primaryKey = 'id_relacion';
    protected $fillable = ['id_servicio', 'id_maquina', 'precio_hr', 'num_hr', 'horas_encendido' ,'valor'];
}