@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a class="text-decoration-none " href="{{ route('productos.index') }}"><< Volver</a>

        <section class=" ">
            <form class="row" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                @csrf
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
                <div class="col-md-12">
                    <div class="md-form">
                        <h6>Texto</h6>
                        <textarea id="subtitle" class="md-textarea form-control" name="subtitle" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <cierres-component :cierres="{{ json_encode($cierres) }}"></cierres-component>
                    <!--<div class="md-form">
                        <p>Seleccionar Cierres</p>
                        <select class="custom-select form-control select2" multiple>
                           @forelse($cierres as $item)
                                <option value="">{!! $item->title !!}</option>
                            @empty
                                <option value="" selected disabled>No hay registros</option>
                            @endforelse
                        </select>
                    </div>-->
                </div>

                <div class="col-md-12">
                    <capacidad-component :capacidades="{{ json_encode($capacidades) }}"></capacidad-component>
                </div>

            </form>
        </section>
    </div>
@endsection
@section('script')
    <script>
        /*$(document).ready(function() {
            $('.select2').select2();
        });*/


        CKEDITOR.replace('subtitle');

        CKEDITOR.config.width = '100%';
    </script>
@stop
