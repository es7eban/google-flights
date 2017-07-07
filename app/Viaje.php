<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $fillable=['duracion','origen','destino','val_tot','cant_con'];
}
