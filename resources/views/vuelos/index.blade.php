@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Vuelos</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>ds</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vuelos as $vuelo)
            <tr>
                <td>{{ $vuelo->origen }}</td>
                <td>{{ $vuelo->destino }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$vuelos->render()}}
    </div>
@endsection