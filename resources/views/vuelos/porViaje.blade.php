@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Vuelos para el viaje:</h1>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>Salida</th>
                <th>Llegada</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duracion</th>
                <th>Duracion Conexion</th>
                <th>Cabina</th>
                <th>Comida</th>
            </tr>
            </thead>
            <thead>
            @foreach($vuelos as $vuelo)
                <tr>
                    <td>{{ $vuelo->fec_hora_sal }}</td>
                    <td>{{ $vuelo->fec_hora_lle }}</td>
                    <td>{{ $vuelo->origen }}</td>
                    <td>{{ $vuelo->destino }}</td>
                    <td>{{ $vuelo->duracion }}</td>
                    <td>{{ $vuelo->con_duracion }}</td>
                    <td>{{ $vuelo->cabina }}</td>
                    <td>{{ $vuelo->comida }}</td>
                </tr>
            @endforeach
            </thead>
        </table>

    </div>
@endsection