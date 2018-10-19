<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{

    protected $primaryKey = 'id';
    protected $table = 'clientes';
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'nombre', 'tipo_doc', 'cedula'
    ];
}
