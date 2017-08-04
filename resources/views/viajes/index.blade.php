@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Viajes</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha salida</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Duracion</th>
                    <th>Cant. Conexiones</th>
                    <th>Valor Total (USD)</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viajes as $viaje)
                <tr>
                    <td>{{ $viaje->vuelos[0]->fec_hora_sal }}</td>
                    <td>{{ $viaje->origen }}</td>
                    <td>{{ $viaje->destino }}</td>
                    <td>{{ $viaje->duracion }}</td>
                    <td>{{ $viaje->cant_con }}</td>
                    <td>{{ $viaje->val_tot }}</td>
                    <td>
                        <a href="{{ route('vuelos_por_viaje',['viaje_id'=>$viaje->id]) }}">
                            Ver vuelos
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script></script>
@endsection