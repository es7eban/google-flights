<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeignOrigenDestinoOnVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vuelos', function (Blueprint $table) {
            $table->foreign('origen')->references('iata_cod')->on('aeropuertos')->onUpdate('cascade')->comment('FK tabla aeropuertos');
            $table->foreign('destino')->references('iata_cod')->on('aeropuertos')->onUpdate('cascade')->comment('FK tabla aeropuertos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vuelos', function (Blueprint $table) {
            $table->dropForeign('aeropuertos_origen_foreign');
            $table->dropForeign('aeropuertos_destino_foreign');
        });
    }
}
