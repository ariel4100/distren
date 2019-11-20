@extends('page.layouts.app')

@section('content')
    <div class="container my-5">
        @include('page.partials.breadcrumb')
        <div class="row">
            {{--@include('page.partials.botonera')--}}
{{--            <botonera-component :categorias="{{ json_encode($categorias) }}" :category="{{ json_encode($categoria) }}" :grupo="{{$grupo_productos}}" :producto="{{ json_encode($producto) }}"></botonera-component>--}}
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 text-center">
                        {{--@dd($producto->offer)--}}
                        <!--Carousel Wrapper-->

                        @if($producto->image)
                        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                @forelse($producto->image as $k=>$item)
                                    <li data-target="#carousel-example-1z" style="background-color: darkgray;" data-slide-to="{{ $k }}" class="{{ $k==0 ? 'active' : '' }}" ></li>
                                @empty
                                @endforelse
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                {{--@dd($producto->image)--}}
                                    {{--<div class="carousel-item  active">--}}
                                        {{--<img class="d-block w-100" style="height: 297px" src="{!! asset($producto->image[0]['image']) !!}"--}}
                                             {{--alt="First slide">--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                                @forelse($producto->image as $k=>$item)
                                    {{--@dd($item['image'])--}}

                                    <div class="carousel-item  {{ $k == 0 ? 'active' : '' }}">
                                        @if($producto->offer)
                                            <div class="img position-relative d-inline-block">
                                                <img class="position-absolute img-fluid " style="z-index: 11; left: -8px; top: -2px;" src="http://osolelaravel.com/partscam/images/general/ofertas.fw.png" alt="">
                                                <img class="img-fluid" style="height: 297px" src="{{ asset($item['image']) }}"
                                                     alt="First slide">
                                            </div>
                                        @else
                                            <img class="img-fluid" style="height: 297px" src="{{ asset($item['image']) }}"
                                                 alt="First slide">
                                        @endif
                                    </div>
                                @empty
                                    {{--<img src="{!! asset($producto->image) !!}" alt="" class="img-fluid">--}}
                                @endforelse
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--/.Carousel Wrapper-->
                        @else
                            <img src="{{ asset('uploads/no-img.png') }}" alt="" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-6 mt-2">
                        @if($producto->offer)
                            {{ $producto->price = $producto->price_offer }}
                        @endif
                            {{--@dd($producto)--}}
                            <h2 class="distren-color font-weight-bold">{!! $producto->title ?? '' !!}</h2>
                        <p class="font-weight-bold"><b>Codigo: </b> {!! $producto->code ?? '' !!}</p>
                        {!! $producto->text ?? '' !!}
                        {{--<a href="{{ route('contacto') }}" class="btn distren-fondo shadow-none m-0 px-4 py-2 p-0">Consultar</a>--}}
                        <producto-carro :producto="{{ json_encode($producto) }}"></producto-carro>
                    </div>
                </div>
                @if(count($producto->related) > 0)
                    <h2 class="my-4">Cierres</h2>
                @endif

                @foreach($producto->related as $value)
                <div class="row mt-4">
                    <div class="col-md-4 text-center" >
                        {{--@dd($producto->offer)--}}
                        <!--Carousel Wrapper-->

                            @if($value->image)
                                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                                    <!--Indicators-->

                                    <ol class="carousel-indicators">
                                        @forelse($value->image as $k=>$item)
                                            <li data-target="#carousel-example-1z" style="background-color: darkgray;" data-slide-to="{{ $k }}" class="{{ $k==0 ? 'active' : '' }}" ></li>
                                        @empty
                                        @endforelse
                                    </ol>
                                    <!--/.Indicators-->
                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        {{--@dd($producto->image)--}}
                                        {{--<div class="carousel-item  active">--}}
                                        {{--<img class="d-block w-100" style="height: 297px" src="{!! asset($producto->image[0]['image']) !!}"--}}
                                        {{--alt="First slide">--}}
                                        {{--</div>--}}
                                        {{--@endif--}}

                                        @forelse($value->image as $k=>$item)
                                            {{--@dd($item['image'])--}}

                                            <div class="carousel-item  {{ $k == 0 ? 'active' : '' }}">
                                                @if($value->offer)
                                                    <div class="img position-relative d-inline-block">
                                                        <img class="position-absolute img-fluid " style="z-index: 11; left: -8px; top: -2px;" src="http://osolelaravel.com/partscam/images/general/ofertas.fw.png" alt="">
                                                        <img class="img-fluid" style="height: 200px" src="{{ asset($item['image']) }}"
                                                             alt="First slide">
                                                    </div>
                                                @else
                                                    <img class="img-fluid" style="height: 200px" src="{{ asset($item['image']) }}"
                                                         alt="First slide">
                                                @endif
                                            </div>
                                        @empty
                                            {{--<img src="{!! asset($producto->image) !!}" alt="" class="img-fluid">--}}
                                        @endforelse
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!--/.Carousel Wrapper-->
                            @else
                                <img src="{{ asset('uploads/no-img.png') }}" style="height: 200px" alt="" class="img-fluid">
                            @endif
                        </div>
                    <div class="col-md-6 mt-2">
                            @if($value->offer)
                                {{ $value->price = $value->price_offer }}
                            @endif
                            {{--@dd($producto)--}}
                            <h2 class="distren-color font-weight-bold">{!! $value->title ?? '' !!}</h2>
                            <p class="font-weight-bold"><b>Codigo: </b> {!! $value->code ?? '' !!}</p>
                            {!! $value->text ?? '' !!}
                            {{--<a href="{{ route('contacto') }}" class="btn distren-fondo shadow-none m-0 px-4 py-2 p-0">Consultar</a>--}}
                            <producto-carro :producto="{{ json_encode($value) }}"></producto-carro>
                        </div>
                    <div class="col-md-2"></div>
                </div>
                @endforeach
                {{--<product-component :terminaciones="{{ json_encode($producto->termination) }}" :producto="{{ $producto->capacity }}" :cierres="{{ $producto->closure }}" :nombreproducto="{{ json_encode($producto->title) }}" :nombrecategoria="{{ json_encode($producto->category->title) }}" :precio="{{ json_encode($precio) }}"></product-component>--}}
{{--                @dd($producto->category->title )--}}
                {{--<product-carrito :capacidad="{{ json_encode($producto->capacity) }}" :cierres="{{ json_encode($producto->closure) }}" :terminaciones="{{ json_encode($producto->termination) }}" nombreproducto="{{ $producto->title }}" nombrecategoria="{{ $producto->category->title }}"></product-carrito>--}}
            </div>
        </div>
    </div>

@endsection
