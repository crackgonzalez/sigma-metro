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
