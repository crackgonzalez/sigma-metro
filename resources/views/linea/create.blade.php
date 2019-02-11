@extends('layouts.app')
@section('titulo','Crear una Linea')
@section('contenido')

<div class="row mt-3 md-3">
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-3"></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 text-center">
                <div class="alert alert-warning" role="alert">{{$error}}</div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-3"></div>
        @endforeach
    @endif
</div>

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-3"></div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6">
        <div class="card card-raised m-2">
            <div class="card-header text-center">
                <h5>Crear una nueva linea</h5>
            </div>
            <div class="card-body">
                <form class="form-group" method="post" autocomplete="off" action="{{url('/linea')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nombre">Nombre de la linea</label>
                        <input type="text" class="form-control" value="{{ old('nombre') }}" name="nombre" id="nombre" placeholder="Ingresa el nombre">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>
                    <button class="btn btn-outline-primary btn-sm" type="submit">Guardar</button>
                    <a class="btn btn-outline-danger btn-sm" href="{{url('/linea')}}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
