<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeccionesM extends Model
{
   
    protected $table='secciones';
    protected $primaryKey = 'idSecc';
    protected $fillable = [
        'nombreSecc'
    ];
    public $timestamps = false;
    public function subsecc(){
        //Obtención de todas las secciones de un Manual
        return $this->hasMany('App\SubSeccion','idSeccion','idSecc');
      }

    public function manual(){
    return $this->belongsTo('App\Manuales','idManual','id');
    }
}
