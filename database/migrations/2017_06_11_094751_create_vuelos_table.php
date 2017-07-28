<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('viaje_id')->unsigned()->comment('Clave foranea tabla viajes');
            $table->time('duracion')->comment('Duración del vuelo');
            $table->char('origen',3)->comment('Clave foranea tabla aeropuertos, aeropuerto de origen ');
            $table->char('destino',3)->comment('Clave foranea tabla aeropuertos, aeropuerto de destino');
            $table->dateTime('fec_hora_sal')->comment('Fecha y hora de salida del vuelo');
            $table->dateTime('fec_hora_lle')->comment('Fecha y hora de llegada del vuelo');
            $table->time('con_duracion')->comment('Duración de la conexión');
            $table->string('cabina',20)->comment('Tipo de cabina');
            $table->string('comida',50)->comment('Tipo de comida a bordo');
            $table->string('carrier_id',10)->comment('Operador del vuelo');
            $table->softDeletes();
            $table->timestamps();#created_at updated_at

            Schema::disableForeignKeyConstraints();

            $table->foreign('viaje_id')->references('id')->on('viajes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelos');
    }
}
