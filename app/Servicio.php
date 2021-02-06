<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $primaryKey = 'id_servicio';
    protected $fillable = ['title', 'start', 'direccion', 'municipio', 'estado', 'id_rfc', 'cfdi', 'monto_facturacion' ,'estatus', 'id_cliente', 'id_operador', 'id_vendedor', 'razon_cancelacion' ,'color'];
}