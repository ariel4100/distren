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
                    </a>
                    <a href="{{ route('producto',$item->id) }}" class="btn py-1 px-4 distren-fondo">Ver más</a>
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
    <div class="container my-5">
        <div class="row">
            @forelse($ofertas as $item)
                <div class="col-md-3 text-center">
                    <a href="{{ route('producto',$item->id) }}" class="position-relative" style="color: #9FA3A5;">
                        <div class="view overlay">
                            <div class="img position-relative">
                                <img class="position-absolute img-fluid " style="z-index: 1; left: -8px; top: -8px;" src="http://osolelaravel.com/partscam/images/general/ofertas.fw.png" alt="">
                            </div>
                            <img src="{{ asset($item->image) }}" class="img-fluid " alt="smaple image"  >
                            <div class="mask flex-center rgba-black-strong">
                                <span class="text-white">+</span>
                            </div>
                        </div>
                        <h4 class="text-center py-1 m-0">{!! $item->title !!} </h4>
                        <h5 class="text-center">Desde <del>${{ $item->price->min('price') }} </del> <span class="distren-color"> ${{ $item->price->min('offer_price') }}</span></h5>
                    </a>
                    <a href="{{ route('producto',$item->id) }}" class="btn py-1 px-4 distren-fondo">Ver más</a>
                </div>
            @empty
                <h4>No hay registros</h4>
            @endforelse
        </div>
    </div>
@endsection
