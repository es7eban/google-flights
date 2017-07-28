<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Viaje extends Model
{
    use SoftDeletes;
    protected $fillable=['duracion','origen','destino','val_tot','cant_con'];

    public function vuelos()
    {
        return $this->hasMany('App\Vuelo');
    }
}
