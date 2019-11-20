@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a class="text-decoration-none " href="{{ route('grupoproducto.index') }}"><< Volver</a>
        <form class="" method="POST" action="{{ route('grupoproducto.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="md-form">
                        <input type="text" id="title" name="title" class="form-control">
                        <label for="title" class="">Titulo</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="order" name="order" class="form-control">
                        <label for="order" class="">Orden</label>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="md-form">
                        <input type="number" id="price" name="price" class="form-control">
                        <label for="price" class="">Precio</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="number" id="quantity" name="quantity" class="form-control">
                        <label for="quantity" class="">Cantidad</label>
                    </div>
                </div> --}}
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="md-form">--}}
                        {{--<h6>Texto</h6>--}}
                        {{--<textarea id="Texto" class="md-textarea form-control" name="text" rows="3"></textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen Principal</label>
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
    <script>
        CKEDITOR.replace('Texto');

        CKEDITOR.config.width = '100%';
    </script>
@stop
