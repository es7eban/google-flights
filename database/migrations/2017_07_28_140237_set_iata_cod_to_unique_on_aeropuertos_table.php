<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetIataCodToUniqueOnAeropuertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aeropuertos', function (Blueprint $table) {
            $table->unique('iata_cod','aeropuertos_iata_cod_unique');
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
        Schema::table('aeropuertos', function (Blueprint $table) {
            $table->dropUnique('aeropuertos_iata_cod_unique');
        });
    }
}
