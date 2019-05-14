@extends('page.layouts.app')

@section('content')
    <div class="container my-5">
        @include('page.partials.breadcrumb')
        <div class="row">
            {{--@dd($categoria->product[0]->category_id)--}}
            @include('page.partials.botonera')
            <div class="col-md-9">
                <div class="row">
                    @forelse($categoria->product as $item)
                        <div class="col-md-3">
                            <a href="{{ route('producto',$item->id) }}" class="" style="color: #9FA3A5;">
                                <div class="view overlay">
                                    <img src="{{ asset($item->image) }}" class="img-fluid " alt="smaple image">
                                    <div class="mask flex-center rgba-black-strong">
                                        <span class="text-white">+</span>
                                    </div>
                                </div>
                                <h4 class="text-center py-1 m-0">{!! $item->title !!} </h4>
                                <h5 class="text-center">Desde <span class="distren-color">$5,00</span></h5>
                            </a>
                        </div>
                    @empty
                        <h4>No hay registros</h4>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
