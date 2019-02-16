@extends('layouts.app')
@section('titulo','Lineas eliminadas')
@section('contenido')

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <h3 class="m-2">Listado de las lineas eliminadas</h3>
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
                    <button class="btn btn-outline-success btn-sm" type="button" data-toggle="modal" data-target="#restaurar{{$linea->id}}">Restaurar</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="restaurar{{$linea->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Restaurar una linea</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" method="post" action="{{url('/linea/delete/'.$linea->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <h6>¿Esta seguro de restaurar la {{$linea->nombre}}?</h6>
                            <button type="submit" class="btn btn-outline-primary btn-sm">Aceptar</button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
