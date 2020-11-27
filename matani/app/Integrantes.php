<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrantes extends Model
{
    protected $table = 'integrantes';
    protected $fillable = ['nombre', 'email','img_url'];
    protected $guard=['id_integrante'];
    public $timestamps = false;
}
