<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = "Vendedores";
    protected $primaryKey = 'id_vendedor';
    protected $fillable = ['nombre', 'apellido', 'estatus'];
}
