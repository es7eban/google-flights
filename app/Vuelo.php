<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $fillable=['viaje_id','duracion','origen','destino','fec_hora_sal',
        'fec_hora_lle','con_duracion','cabina','comida','carrier_id'];
}
