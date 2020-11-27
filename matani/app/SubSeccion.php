<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSeccion extends Model
{
    
      
    protected $table = 'subSecciones';
    protected $fillable = ['contador','nombre', 'contenido'];
    protected $guard=['idSeccion'];
   
    
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*
     protected $hidden = [
        'password', 'remember_token',
    ];
    */
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*
     protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */    

    
}
