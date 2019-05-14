@extends('page.layouts.app')

@section('content')
    <div class="container my-5">
        @include('page.partials.breadcrumb')
        <div class="row">
            @include('page.partials.botonera')
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($producto->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4 class="distren-color font-weight-bold">{!! $producto->title !!}</h4>
                        {!! $producto->text !!}
                    </div>
                </div>
                <h4 class="distren-color mt-5">Cierres Posibles</h4>
                <div class="row">
                    {{--@dd($productos->closure)--}}
                    @forelse($producto->closure as $cierre)
                        <div class="col-md-2 mb-4">
                            <img src="{{ asset($cierre->image) }}" alt="" class="img-fluid" style="height: 100px;">
                        </div>
                    @empty

                    @endforelse
                </div>
                <product-component :producto="{{ $producto->capacity }}" :cierres="{{ $producto->closure }}"></product-component>

            </div>
        </div>
    </div>

@endsection
