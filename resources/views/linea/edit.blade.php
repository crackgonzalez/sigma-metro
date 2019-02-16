@extends('layouts.app')
@section('titulo','Modificar una Linea')
@section('contenido')

@include('includes/error')

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-3"></div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6">
        <div class="card card-raised m-2">
            <div class="card-header text-center">
                <h5>Modificar una linea</h5>
            </div>
            <div class="card-body">
                <form class="form-group" method="post" autocomplete="off" action="" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="nombre">Nombre de la linea</label>
                        <input type="text" class="form-control" value="{{ old('nombre',$linea->nombre) }}" name="nombre" id="nombre" placeholder="Ingresa el nombre">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                        @if($linea->imagen)
                            <small>Subir una nueva imagen solo si desea reemplazar la imagen anterior</small>
                        @endif
                    </div>
                    <button class="btn btn-outline-primary btn-sm" type="submit">Actualizar</button>
                    <a class="btn btn-outline-danger btn-sm" href="{{url('/linea')}}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
