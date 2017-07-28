@extends('layouts.app')
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('vuelos_find_path')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group col-lg-5">
            <input type="text" class="form-control" name="origen" value="{{old('origen')}}" placeholder="aeropuerto origen">
            <input type="text" class="form-control" name="destino" value="{{old('destino')}}" placeholder="aeropuerto destino">
            <br>
            <label for="">Rango de busqueda (solo pasajes de ida)</label>
            <input type="text" class="form-control date" name="fec_ini" value="{{old('fec_ini')}}" placeholder="fecha inicio">
            <input type="text" class="form-control date" name="fec_fin" value="{{old('fec_fin')}}" placeholder="fecha fin">
            <br>
            <button type="submit" class="btn">consultar</button>
        </div>
    </form>
@endsection