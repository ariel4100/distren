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
    {{--<!-- Button trigger modal -->--}}
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
        {{--Launch demo modal--}}
    {{--</button>--}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <h4>Tipo de Contenedor</h4>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">40´ BOX</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Or toggle this other custom radio</label>
                        </div>
                    </div>
                    <div class="">
                        <h4>Medida unitaria (embalaje):</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Largo</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
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
