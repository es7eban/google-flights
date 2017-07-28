<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeignCiudadCodOnAeropuertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aeropuertos', function (Blueprint $table) {
            $table->foreign('ciudad_cod')->references('cod')->on('ciudades')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aeropuertos', function (Blueprint $table) {
            $table->dropForeign('aeropuertos_ciudad_cod_foreign');
        });
    }
}
