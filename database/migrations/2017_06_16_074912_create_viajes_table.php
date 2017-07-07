<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->time('duracion')->comment('Duración total del viaje');
            $table->char('origen',3)->comment('Aeropuerto de origen');
            $table->char('destino',3)->comment('Aeropueto de destino');
            $table->integer('val_tot')->comment('Costo total de ::momento en pesos CLP::');
            $table->tinyInteger('cant_con')->comment('Cantidad de vuelos de conexión');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
