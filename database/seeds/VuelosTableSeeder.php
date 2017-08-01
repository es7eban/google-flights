<?php

use Illuminate\Database\Seeder;
use App\Vuelo;

class VuelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vuelo::class,9)->create();
    }
}
