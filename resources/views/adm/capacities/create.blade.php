@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a class="text-decoration-none " href="{{ route('capacidades.index') }}"><< Volver</a>
        <form class="" method="POST" action="{{ route('capacidades.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="md-form">
                        <input type="text" id="cc" name="cc" class="form-control">
                        <label for="cc" class="">CC</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="order" name="order" class="form-control">
                        <label for="order" class="">Orden</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 my-4 text-right">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    {{--<script>--}}
        {{--CKEDITOR.replace('Texto');--}}

        {{--CKEDITOR.config.width = '100%';--}}
    {{--</script>--}}
@stop
