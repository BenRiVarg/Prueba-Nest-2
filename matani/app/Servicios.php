<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'servicios';
    protected $fillable = ['nombre', 'posicion','img_url'];
    protected $guard=['id_servicio'];
}
