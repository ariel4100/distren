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
                            {{--<img src="{{ asset($item->image) }}" class="img-fluid " alt="smaple image">--}}
                            @if($item->image)
                                <img src="{{ asset($item->image[0]['image']) }}" class="img-fluid " alt="smaple image">
                            @else
                                <img src="{{ asset('uploads/no-img.png') }}" alt="" class="img-fluid">
                            @endif
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

    <div class="distren-fondo py-5">
        <div class="container">
            <div class="row">
                @foreach($contenido as $item)
                    <div class="col-md-4 d-flex align-items-center mt-4">
                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid mx-3">
                        {!! $item->text ?? '' !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="" style="background-color: #EAEAEA">
        <div class="container py-4 text-center">
            {!! $home->text ?? ''!!}
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @forelse($ofertas as $item)
                <div class="col-md-3 text-center mt-5">
                    <a href="{{ route('producto',$item->id) }}" class="position-relative" style="color: #9FA3A5;">
                        <div class="view overlay">
                            <div class="img position-relative">
                                <img class="position-absolute img-fluid " style="z-index: 1; left: -8px; top: -8px;" src="http://osolelaravel.com/partscam/images/general/ofertas.fw.png" alt="">
                            </div>
                            @if($item->image)
                                <img src="{{ asset($item->image[0]['image']) }}" class="img-fluid " alt="smaple image">
                            @else
                                <img src="{{ asset('uploads/no-img.png') }}" alt="" class="img-fluid">
                            @endif
                            <div class="mask flex-center rgba-black-strong">
                                <span class="text-white">+</span>
                            </div>
                        </div>
                        <h4 class="text-center py-1 m-0">{!! $item->title ?? '' !!} </h4>
                        <h5 class="text-center">Desde <del>$  </del> <span class="distren-color"> $ {!! number_format($item->price,2,',','.') ?? '' !!} </span></h5>
                    </a>
                    <a href="{{ route('producto',$item->id) }}" class="btn py-1 px-4 distren-fondo">Ver más</a>
                </div>
            @empty
                <h4>No hay registros</h4>
            @endforelse
        </div>
    </div>
@endsection
