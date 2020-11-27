<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sxfaqs ;


class Faqs extends Model
{   
    protected $table = 'faqs';

    protected $fillable = [
        'idManual','nombre', 'contenido'
    ];


}
