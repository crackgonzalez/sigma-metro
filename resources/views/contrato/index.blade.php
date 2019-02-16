@extends('layouts.app')
@section('titulo','Contratos')
@section('contenido')

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <a class="btn btn-outline-primary btn-sm m-3" href="{{url('/contrato/create')}}">Crear un contrato</a>
        <h3 class="m-2">Listado de los contratos</h3>
        <hr>
    </div>
</div>

<div class="row">
    @foreach($contratos as $contrato)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-center">
            <div class="card card-raised m-2 border-primary">
                <div class="card-body text-primary">
                    <h5 class="card-title">{{$contrato->modalidad}}</h5>
                    <p class="card-text">Contrato de {{$contrato->horas}} hrs.</p>
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-success btn-sm" href="{{url('/contrato/'.$contrato->id.'/edit')}}">Modificar</a>
                    <button class="btn btn-outline-danger btn-sm" type="button" data-toggle="modal" data-target="#eliminar{{$contrato->id}}">Eliminar</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="eliminar{{$contrato->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar un contrato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" method="post" action="{{url('/contrato/'.$contrato->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <h6>¿Esta seguro de eliminar la {{$contrato->modalidad}}?</h6>
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
