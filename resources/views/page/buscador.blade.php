@extends('page.layouts.app')
@push('style')
    <style>
        #myClassicTab .nav-link{
            color: #000 !important;
        }
        #myClassicTab li .active{
            border-bottom: 2px solid #FFB900 !important;
        }
        #myClassicTab li a{
            border-bottom: 2px solid transparent;
        }
    </style>
@endpush
@section('content')
    <div class="container" style="margin-top: 8rem">
        <div class="row">
            <div class="col-md-12">
                <h2 class="py-2" style="border-bottom: 2px solid #8BBF40; width: 100px">Buscador</h2>
            </div>
        </div>
        <form class="row justify-content-center my-4" action="{{ route('buscador') }}" method="get">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control my-2" placeholder="Buscar...">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn distren-fondo btn-md px-5 m-0 my-2">Buscar</button>
            </div>
        </form>


        <div class="row my-5">
            @forelse($resultado as $item)
                {{--@dd($item->image[0]['image'])--}}
                <div class="col-md-3 col-sm-6  mb-5">
                    <a href="{{ route('producto',['producto' => $item->id]) }}" class=" " style="text-decoration: none; color: unset;">
                        <div class="text-center">
                            {{--<img class="img-fluid" src="{{ asset($item->image[0]['image'] ?? '') }}" alt="Card image cap">--}}
                            @if($item->image)
                                <img src="{{ asset($item->image[0]['image']) }}" style="height: 200px" class="img-fluid " alt="smaple image">
                            @else
                                <img src="{{ asset('uploads/no-img.png') }}" style="height: 200px" alt="" class="img-fluid">
                            @endif
                            {{--@dd($item->capacity->min('price'))--}}
                            <h4 class="text-center py-1 m-0">{!! $item->title !!} </h4>
                            <h5 class="text-center">Desde <del>${{ $item->capacity->min('price') ?? '' }} </del> <span class="distren-color"> ${{ $item->capacity->min('price_offer') }}</span></h5>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col">
                    <h4>No se encontraron resultados</h4>
                </div>
            @endforelse
        </div>
    </div>
@endsection
