<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cod',3)->unique()->comment('Codigo de la ciudad donde esta el aeropuerto /trips.data.city[].code');
            $table->string('ciudad_nom')->comment('Nombre de la ciudad donde esta el aeropuerto');
            $table->char('pais_cod',2)->nullable()->comment('Codigo de dos caracteres del pais donde esta el aeropuerto');
            $table->softDeletes();
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
}
