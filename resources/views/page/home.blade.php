@extends('page.layouts.app')
@section('style')
    <style>
        .list-group-item {
            position: relative;
            display: block;
            padding: .50rem 1.25rem;
            margin-bottom: -1px;
            background-color: #fff;
            border: unset;
        }

    </style>
@endsection
@section('content')
    @include('page.partials.carousel')
    <div class="container my-5">
        <div class="row">
            @foreach($productos as $item)
                <div class="col-md-3 text-center">
                    <a href="{{ route('producto',$item->id) }}" class="" style="color: #9FA3A5;">
                        <div class="view overlay">
                            <img src="{{ asset($item->image) }}" class="img-fluid " alt="smaple image">
                            <div class="mask flex-center rgba-black-strong">
                                <span class="text-white">+</span>
                            </div>
                        </div>
                        <h4 class=" py-2 m-0">{!! $item->title !!} </h4>
                        <a href="{{ route('producto',$item->id) }}" class="btn py-1 px-4 distren-fondo">Ver más</a>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="distren-fondo py-5">
        <div class="container">
            <div class="row">
                @foreach($contenido as $item)
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid mx-3">
                        {!! $item->text !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="" style="background-color: #EAEAEA">
        <div class="container py-4 text-center">
            {!! $home->text !!}
        </div>
    </div>
    {{--<div class="container my-5">--}}
        {{--<div class="row ">--}}
            {{--<div class="col-md-6 wow fadeInUp">--}}
                {{--<h4 class="font-weight-bold tpn-blue">{!! $home->text !!}</h4>--}}
                {{--<a href="{{ route('servicios') }}" class="btn btn-danger">MÁS SERVICIOS</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-6 fadeInDown">--}}
                {{--<ul class="list-group">--}}
                    {{--@foreach($servicios as $k=>$s)--}}
                        {{--<li class="list-group-item wow fadeInUp d-flex align-items-center" data-wow-delay="0.{{ $k*2 }}s">--}}
                            {{--<img src="{!! $s->image !!}" alt="" class="img-fluid mr-4" style="width: 30px">--}}
                            {{--{!! $s->title !!}--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@if(count($equipamientos) > 0)--}}
        {{--<div class="container-fluid " style="background-color: #F5F5F5">--}}
            {{--<div class="container py-5">--}}
                {{--<h4 class="tpn-blue font-weight-bold  wow fadeInDown">{!! $empresa->subtitle !!}</h4>--}}
                {{--<div class="row">--}}
                    {{--@forelse($equipamientos as $k=>$e)--}}
                        {{--<div class="col-md-3 wow fadeInUp" data-wow-delay="0.{{ $k*2 }}s">--}}
                            {{--<img src="{!! $e->image !!}" alt="" class="img-fluid my-4" >--}}
                            {{--{!! $e->text !!}--}}
                        {{--</div>--}}
                    {{--@empty--}}
                        {{--<h4>No hay registros</h4>--}}
                    {{--@endforelse--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<img src="{{ $home->image }}" class="img-fluid" alt="">--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
