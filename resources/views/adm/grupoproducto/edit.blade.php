@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a class="text-decoration-none " href="{{ route('grupoproducto.index') }}"><< Volver</a>
        <form class="" method="POST" action="{{ route('grupoproducto.update',$terminacion->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="md-form">
                        <input type="text" id="title" name="title" class="form-control" value="{!! $terminacion->title !!}">
                        <label for="title" class="">Titulo</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="order" name="order" class="form-control" value="{!! $terminacion->order !!}">
                        <label for="order" class="">Orden</label>
                    </div>
                </div>

                <div class="container">
                    <select-component2 :producto="{{ json_encode($terminacion) }}" :categorias="{{ json_encode($categorias) }}" :subcategorias="{{ json_encode($subcategorias) }}"></select-component2>

                </div>
                {{-- <div class="col-md-6">
                    <div class="md-form">
                        <input type="number" id="price" name="price" class="form-control" value="{!! $terminacion->price !!}">
                        <label for="price" class="">Precio</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="number" id="quantity" name="quantity" class="form-control" value="{!! $terminacion->quantity !!}">
                        <label for="quantity" class="">Cantidad</label>
                    </div>
                </div> --}}
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="md-form">--}}
                        {{--<h6>Texto</h6>--}}
                        {{--<textarea id="Texto" class="md-textarea form-control" name="text" rows="3">{!! $categoria->text !!}</textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen Principal</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 my-5 text-center">
                    <img src="{{ asset($terminacion->image) }}" alt="" class="img-fluid" style="height: 200px">
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
        CKEDITOR.replace('subtitle');

        CKEDITOR.config.width = '100%';
    </script>
@stop

