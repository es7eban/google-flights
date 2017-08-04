<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindVuelosRequest;
use App\Viaje;
use App\Vuelo;
use App\Ciudad;
use App\Aeropuerto;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$vuelos = Vuelo::all();
        $vuelos = Vuelo::orderBy('id','desc')->paginate(10);

        return view('vuelos/index')->with(['vuelos'=>$vuelos]);
    }

    public function findVuelosPorViaje($viaje_id)
    {
        $vuelos = Vuelo::where('viaje_id',$viaje_id)->orderBy('id','asc')->get();

        return view('vuelos/porViaje')->with(['vuelos'=>$vuelos]);
    }

    public function formFind()
    {
        return view('vuelos/formFind');
    }

    public function find(FindVuelosRequest $request,Client $client)
    {
        #$vuelo = Vuelo::create($request->only('inp1','inp2','inp3'));
        $origen=$request->get('origen');
        $destino=$request->get('destino');
        $fec_ini=Carbon::parse($request->get('fec_ini'));
        $fec_fin=Carbon::parse($request->get('fec_fin'));

        $response = [];
        $body = $this->returnBodyReq();
        if($fec_fin->lte($fec_ini)){
            $slice = [['origin'=>$origen,'destination'=>$destino,'date'=>$fec_ini->format('Y-m-d')]];
            $body['request']['slice']=$slice;
            $response = $client->post('search?key=AIzaSyDl25-vy1Jt0LrfJap7KDSkt-ylO63vys0',[
                'json'=>$body
            ]);
        }else{
            for($fec_ini;$fec_ini->lte($fec_fin);$fec_ini->addDay()){
                $slice = [['origin'=>$origen,'destination'=>$destino,'date'=>$fec_ini->format('Y-m-d')]];
                $body['request']['slice']=$slice;
                array_push($response, $client->post('search?key=AIzaSyDl25-vy1Jt0LrfJap7KDSkt-ylO63vys0',[
                    'json'=>$body
                ]));
            }
        }

        if(!is_array($response)){
            $this->storeResponse($request,$response);
        }else{
            foreach ($response as $resp){
                $this->storeResponse($request,$resp);
            }
        }
        return redirect()->route('viajes_path');
    }

    private function returnBodyReq()
    {
        return[
            'request'=>[
                'slice'=>[#['origin'=>'','destination'=>'','date'=>'']
                ],
                'passengers'=>[
                    'adultCount'=>1,'infantInLapCount'=>0,'infantInSeatCount'=>0,'childCount'=>0,'seniorCount'=>0
                ],
                'solutions'=>'10',
                'refundable'=>'false'
            ]
        ];
    }

    private function storeResponse(FindVuelosRequest $request,$response)
    {
        $resp = json_decode($response->getBody()->getContents());
        foreach ($resp->trips->data->city as $ciudad){
            $country = null;
            if(property_exists($ciudad,'country')){
                $country = ['pais_cod'=>$ciudad->country];
            }
            Ciudad::firstOrCreate(['cod'=>$ciudad->code],['ciudad_nom'=>$ciudad->name],$country);
        }
        foreach ($resp->trips->data->airport as $aeropuerto){
            Aeropuerto::firstOrCreate([
                'iata_cod' => $aeropuerto->code,
                'ciudad_cod' => $aeropuerto->city,
                'nombre' => $aeropuerto->name
            ]);
        }
        foreach ($resp->trips->tripOption as $viaje){
            $viajeCreado = Viaje::create([
                'duracion' => gmdate('H:i:s',$viaje->slice[0]->duration),
                'origen' => strtoupper($request->get('origen')),
                'destino' => strtoupper($request->get('destino')),
                'val_tot' => substr($viaje->pricing[0]->baseFareTotal,3),
                'cant_con' => count($viaje->slice[0]->segment)
            ]);

            foreach ($viaje->slice[0]->segment as $vuelo){
                $conDuracion = property_exists($vuelo,'connectionDuration')?gmdate('H:i:s',$vuelo->connectionDuration):null;
                $meal = property_exists($vuelo->leg[0],'meal')?$vuelo->leg[0]->meal:null;
                $fecHoraSal = Carbon::parse($vuelo->leg[0]->departureTime);
                $fecHoraLle = Carbon::parse($vuelo->leg[0]->arrivalTime);
                Vuelo::create([
                    'viaje_id' => $viajeCreado->getAttribute('id'),
                    'duracion' => gmdate('H:i:s',$vuelo->duration),
                    'origen' => $vuelo->leg[0]->origin,
                    'destino' => $vuelo->leg[0]->destination,
                    'fec_hora_sal' => $fecHoraSal->format('Y-m-d H:i:s'),
                    'fec_hora_lle' => $fecHoraLle->format('Y-m-d H:i:s'),
                    'con_duracion' => $conDuracion,
                    'cabina' => $vuelo->cabin,
                    'comida' => $meal,
                    'carrier_id' => $vuelo->flight->carrier
                ]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
