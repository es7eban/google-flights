<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aeropuerto extends Model
{
    use SoftDeletes;

    protected $fillable = ['iata_cod','ciudad_cod','nombre'];
    protected $table = 'aeropuertos';

    public function viajes()
    {
        $this->hasMany('App\Viaje');
    }

    public function vuelos()
    {
        $this->hasMany('App\Vuelo');
    }

    public function ciudad()
    {
        $this->belongsTo('App\Ciudad');
    }
}
