<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manuales extends Model
{
    protected $primaryKey = 'id';
    protected $fillable =  ['nombre','clavem','img','descripcion'];
  
    public function seccionesFaq(){
        return $this->hasMany('App\Sxfaqs','idManual','id');
      }

    public function SeccionesM(){
        //Obtención de los titulos  e indices de todas las secciones del Manual
        return $this->hasMany('App\SeccionesM','idManual','id');
    }
}
