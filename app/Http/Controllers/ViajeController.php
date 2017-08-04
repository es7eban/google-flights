<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Viaje;

class ViajeController extends Controller
{
    public function index()
    {
        $viajes = Viaje::all();

        return view('viajes/index')->with(['viajes'=>$viajes]);
    }


}
