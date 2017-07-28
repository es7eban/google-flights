<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAeropuertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeropuertos', function (Blueprint $table){
            $table->increments('id');
            $table->char('iata_cod',3)->comment('Codigo IATA del aeropuerto /trips.data.airport[].code');
            $table->char('ciudad_cod',3)->comment('Codigo de la ciudad donde esta el aeropuerto /trips.data.airport[].city');
            $table->string('nombre')->comment('Nombre del aeropuerto /trips.data.airport[].name');
            $table->softDeletes();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('aeropuertos');
    }
}
