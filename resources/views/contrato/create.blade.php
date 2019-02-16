@extends('layouts.app')
@section('titulo','Crear un contrato')
@section('contenido')

@include('includes/error')

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-3"></div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6">
        <div class="card card-raised m-2">
            <div class="card-header text-center">
                <h5>Crear un nuevo contrato</h5>
            </div>
            <div class="card-body">
                <form class="form-group" method="post" autocomplete="off" action="{{url('/contrato')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="modalidad">Modalidad del contrato</label>
                        <input type="text" class="form-control" value="{{ old('modalidad') }}" name="modalidad" id="modalidad" placeholder="Ingrese la modalidad del contrato">
                    </div>
                    <div class="form-group">
                        <label for="horas">Horas del contrato</label>
                        <input type="text" class="form-control" value="{{ old('horas') }}" name="horas" id="horas" placeholder="Ingrese las horas del contrato">
                    </div>
                    <button class="btn btn-outline-primary btn-sm" type="submit">Guardar</button>
                    <a class="btn btn-outline-danger btn-sm" href="{{url('/contrato')}}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
