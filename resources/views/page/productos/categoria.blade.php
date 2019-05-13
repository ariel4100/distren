@extends('page.layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            @foreach($categorias as $item)
            <div class="col-md-4">
                <a href="" class="">
                    <div class="view overlay">
                        <img src="{{ asset($item->image) }}" class="img-fluid " alt="smaple image">
                        <div class="mask flex-center rgba-red-strong">
                            <p class="white-text">{!! $item->title !!}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
