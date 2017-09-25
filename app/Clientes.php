<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['nombres', 'apellidos', 'tipo_contacto','identificacion', 'tipo_identificacion','alerta', 'edad','fecha_creacion', 'ciudad_nacimiento,'];
}
