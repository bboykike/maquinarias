<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $primaryKey = 'id_rfc';
    protected $fillable = ['id_rfc', 'nombre_fiscal', 'direccion_fiscal', 'codigo_postal', 'idcopia'];
}