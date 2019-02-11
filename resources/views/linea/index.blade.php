@extends('layouts.app')
@section('titulo','Lineas')
@section('contenido')

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <a class="btn btn-outline-primary btn-sm m-3" href="{{url('/linea/create')}}">Crear una Linea</a>
        <h3 class="m-2">Listado de las lineas</h3>
        <hr>
    </div>
</div>

<div class="row">
    @foreach($lineas as $linea)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-center">
            <div class="card card-raised m-2">
                <div class="card-header text-center">
                    <h5 class="card-title">{{$linea->nombre}}</h5>
                </div>
                <div class="card-body">
                    <img class="img-raised rounded-circle imagen-card" src="{{$linea->url}}" alt="{{$linea->nombre}}">
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-success btn-sm" href="{{url('/linea/'.$linea->id.'/edit')}}">Modificar</a>
                    <button class="btn btn-outline-danger btn-sm" type="button" data-toggle="modal" data-target="#delmodal{{$linea->id}}">Eliminar</button>
                </div>
            </div>
        </div>
        @include('includes/delmodal')
    @endforeach
</div>

@endsection
