<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use SoftDeletes;

    protected $table = 'ciudades';
    protected $fillable = ['cod','ciudad_nom','pais_cod'];

    public function aeropuertos()
    {
        $this->hasMany('App\Aeropuerto');
    }

}
