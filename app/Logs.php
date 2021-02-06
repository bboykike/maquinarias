<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $primaryKey = 'id_logs';
    protected $fillable = ['id_relacion_fk', 'hrmt_inicial', 'hrmt_final', 'hrs_inactivo', 'hrs_activo', 'num_hrs_ensendido'];

}
