<div class="modal fade" id="delmodal{{$linea->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar una linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="post" action="{{url('/linea/'.$linea->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <h6>¿Esta seguro de eliminar la {{$linea->nombre}}?</h6>
                    <button type="submit" class="btn btn-primary btn-sm">Aceptar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
