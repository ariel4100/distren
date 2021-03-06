@extends('page.layouts.app')
@section('style')
    <style>
        .nav-link{
            color: #737384;
        }
    </style>
@stop
@section('content')
    <div class="container my-5">
        @include('page.partials.breadcrumb')
        <div class="row">
            {{--@dd($categoria->product[0]->category_id)--}}
            {{--@include('page.partials.botonera')--}}
{{--            @dd($categoria)--}}

{{--            @php($categoria->id == 2)--}}

            @if($categoria->id == 2)
{{--                @dd(array_reverse($categoria->subcategory->toArray(),true))--}}
            <botonera-component :categorias="{{ json_encode($categorias) }}"  :category="{{ json_encode($categoria) }}"></botonera-component>
            <familia-component :category="{{ json_encode($categoria) }}" inverso="1" :productos="{{ json_encode($categoria->product->sortBy('order')) }}"></familia-component>
            @else
                <botonera-component :categorias="{{ json_encode($categorias) }}" :category="{{ json_encode($categoria) }}"></botonera-component>
                <familia-component :category="{{ json_encode($categoria) }}"  :productos="{{ json_encode($categoria->product->sortBy('order')) }}"></familia-component>

            @endif
{{--            <div class="col-md-9">--}}
{{--                <div class="row justify-content-center mb-3">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <a href="" class="nav-link text-uppercase">--}}
{{--                            Todos--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @forelse($subcategorias as $item)--}}
{{--                    <div class="col-md-3">--}}
{{--                        <a href="{{ route('subcategoria',$item->id) }}" class="nav-link text-uppercase">--}}
{{--                            {{ $item->title }}--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @empty--}}
{{--                    @endforelse--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @forelse($categoria->product as $item)--}}
{{--                        @if($item->offer)--}}
{{--                            <div class="col-md-3 text-center">--}}
{{--                                <a href="{{ route('producto',$item->id) }}" class="position-relative" style="color: #9FA3A5;">--}}
{{--                                    <div class="view overlay">--}}
{{--                                        <div class="img position-relative">--}}
{{--                                            <img class="position-absolute img-fluid " style="z-index: 1; left: -8px; top: -8px;" src="http://osolelaravel.com/partscam/images/general/ofertas.fw.png" alt="">--}}
{{--                                        </div>--}}
{{--                                        @if($item->image)--}}
{{--                                            <img src="{{ asset($item->image) }}" class="img-fluid " alt="smaple image">--}}
{{--                                        @else--}}
{{--                                            <img src="{{ asset('uploads/no-img.png') }}" alt="" class="img-fluid">--}}
{{--                                        @endif--}}
{{--                                        <div class="mask flex-center rgba-black-strong">--}}
{{--                                            <span class="text-white">+</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="text-center py-1 m-0">{!! $item->title !!} </h4>--}}
{{--                                    --}}{{--<h5 class="text-center">Desde <del>${{ $item->price->min('price') }} </del> <span class="distren-color"> ${{ $item->price->min('offer_price') }}</span></h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="col-md-3">--}}
{{--                                <a href="{{ route('producto',$item->id) }}" class="" style="color: #9FA3A5;">--}}
{{--                                    <div class="view overlay">--}}
{{--                                        @if($item->image)--}}
{{--                                            <img src="{{ asset($item->image) }}" class="img-fluid " alt="smaple image">--}}
{{--                                        @else--}}
{{--                                            <img src="{{ asset('uploads/no-img.png') }}" alt="" class="img-fluid">--}}
{{--                                        @endif--}}
{{--                                        <div class="mask flex-center rgba-black-strong">--}}
{{--                                            <span class="text-white">+</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="text-center py-1 m-0">{!! $item->title !!} </h4>--}}
{{--                                    <h5 class="text-center">Desde <span class="distren-color">${{ $item->price->min('price') }}</span></h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @empty--}}
{{--                        <h4>No hay registros</h4>--}}
{{--                    @endforelse--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
@endsection
