<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindVuelosRequest;
use App\Vuelo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VuelosController extends Controller
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

    public function formFind()
    {
        return view('vuelos.formFind');
    }

    public function find(FindVuelosRequest $request,Client $client)
    {
        #$vuelo = Vuelo::create($request->only('inp1','inp2','inp3'));
        $origen=$request->get('origen');
        $destino=$request->get('destino');
        $fec_ini=$request->get('fec_ini');
        $fec_fin=$request->get('fec_fin');

        $body = $this->returnBodyReq();
        $slice = [['origin'=>$origen,'destination'=>$destino,'date'=>$fec_ini]];
        $body['request']['slice']=$slice;

        $response = $client->post('search?key=AIzaSyDl25-vy1Jt0LrfJap7KDSkt-ylO63vys0',[
            'json'=>$body
        ]);

        dd($response->getBody()->getContents());
    }

    private function returnBodyReq()
    {
        return[
            'request'=>[
                'slice'=>[
                    #['origin'=>'','destination'=>'','date'=>'']
                ],
                'passengers'=>[
                    'adultCount'=>1,'infantInLapCount'=>0,'infantInSeatCount'=>0,'childCount'=>0,'seniorCount'=>0
                ],
                'solutions'=>'50',
                'refundable'=>'false'
            ]
        ];
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
