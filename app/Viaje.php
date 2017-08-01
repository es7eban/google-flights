<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Viaje extends Model
{
    use SoftDeletes;

    protected $fillable = ['duracion','origen','destino','val_tot','cant_con'];
    protected $table = 'viajes';

    public function vuelos()
    {
        return $this->hasMany('App\Vuelo');
    }

    public function aeropuerto()
    {
        return $this->belongsTo('App\Aeropuerto');
    }
}
