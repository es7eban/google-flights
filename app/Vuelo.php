<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vuelo extends Model
{
    use SoftDeletes;
    protected $fillable=['viaje_id','duracion','origen','destino','fec_hora_sal',
        'fec_hora_lle','con_duracion','cabina','comida','carrier_id'];
    protected $table = 'vuelos';

    public function viaje()
    {
        return $this->belongsTo('App\Viaje');
    }

    public function aeropuerto()
    {
        return $this->belongsTo('App\Aeropuerto');
    }
}
