@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a class="text-decoration-none " href="{{ route('productos.index') }}"><< Volver</a>
        <form class="" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
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
                    <div class="col-md-6">
                        <h6>Precio</h6>
                        <div class="md-form input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text md-addon">$</span>
                            </div>
                            <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text md-addon">.00</span>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Precio Oferta</h6>
                        <div class="md-form input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text md-addon">$</span>
                            </div>
                            <input type="text" class="form-control" name="price_offer" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text md-addon">.00</span>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <h6>Texto</h6>
                            <textarea id="subtitle" class="md-textarea form-control" name="text" rows="3"></textarea>
                        </div>
                    </div>
                </div>
{{--            @dd($subcategorias)--}}
            <select-component :categorias="{{ json_encode($categorias) }}" :subcategoria="{{ json_encode($subcategorias) }}"></select-component>
{{--            <div class="row">--}}
{{--                <div class="col-md-6 mt-4">--}}
{{--                    <p>Seleccionar Categoria</p>--}}
{{--                    <select class="custom-select form-control select2" name="category_id">--}}
{{--                        @forelse($categorias as $item)--}}
{{--                            <option value="{!! $item->id !!}">{!! $item->title !!}</option>--}}
{{--                        @empty--}}
{{--                            <option value="" selected disabled>No hay registros</option>--}}
{{--                        @endforelse--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 mt-4">--}}
{{--                    <p>Seleccionar Subcategoria</p>--}}
{{--                    <select class="custom-select form-control select2" name="subcategory_id">--}}
{{--                        @forelse($subcategorias as $item)--}}
{{--                            <option value="{!! $item->id !!}">{!! $item->title !!}</option>--}}
{{--                        @empty--}}
{{--                            <option value="" selected disabled>No hay registros</option>--}}
{{--                        @endforelse--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
            {{--<capacidad-component :terminaciones="{{ json_encode($terminaciones) }}" :capacidades="{{ json_encode($capacidades) }}" :cierres="{{ json_encode($cierres) }}"></capacidad-component>--}}

            <cierres-component :related="{{ json_encode($productos) }}" :selectedrelated="{{ json_encode($producto->related ?? []) }}"></cierres-component>

            <gallery-component></gallery-component>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="featured">
                        <label class="custom-control-label" for="customSwitch1">Destacado</label>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="Oferta" name="offer">
                        <label class="custom-control-label" for="Oferta">Oferta</label>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input"  id="listado" name="listado">
                        <label class="custom-control-label" for="listado">Listado</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-4 text-right">
                <button type="submit"  class="btn btn-success">Guardar</button>
            </div>
        </form>
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
