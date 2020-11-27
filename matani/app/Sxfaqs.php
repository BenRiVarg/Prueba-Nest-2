<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manuales;

class Sxfaqs extends Model
{   
    protected $table='faqSecciones';
    protected $primaryKey = 'id_SF';
    protected $fillable = [
        'nombre'
    ];
    public $timestamps = false;

    
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

    public function faqs(){
        return $this->hasOne('App\Faqs','id_sf','id_SF');
      }

    public function manual(){
        return $this->belongsTo('App\Manuales','idManual','id');
    }
}
