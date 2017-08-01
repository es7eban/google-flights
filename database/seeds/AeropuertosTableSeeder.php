<?php

use Illuminate\Database\Seeder;
use App\Aeropuerto;

class AeropuertosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Aeropuerto::class,9)->create();
    }
}
