<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeignOrigenDestinoOnViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viajes', function (Blueprint $table) {
            $table->foreign('origen')->references('iata_cod')->on('aeropuertos')->onUpdate('cascade');
            $table->foreign('destino')->references('iata_cod')->on('aeropuertos')->onUpdate('cascade');
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
        Schema::table('viajes', function (Blueprint $table) {
            $table->dropForeign('viajes_origen_foreign');
            $table->dropForeign('viajes_destino_foreign');
        });
    }
}
