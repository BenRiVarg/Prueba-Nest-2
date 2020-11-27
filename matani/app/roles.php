<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
  protected $primaryKey = 'id_rol';
  protected $fillable =  ['id_rol','nombre'];

  public function user(){
    return $this->belongsTo('App\User','id_rol','id');
  }
}
