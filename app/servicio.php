<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    //id, created_at, updated_at, nombre_empresa, tipo_empresa, numero_accionistas, cantidad_capital, departamento, ciudad, suceso, soportes
    protected $primaryKey = 'id';
    protected $table = 'servicios';
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'nombre_empresa', 'tipo_empresa', 'numero_accionistas', 'cantidad_capital', 'departamento', 'ciudad', 'suceso', 'soportes'
    ];
}
