@extends('page.layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            @foreach($categorias as $item)
            <div class="col-md-4 my-4">
                <a href="{{ route('categoria',$item->id) }}" class="" style="color: #9FA3A5;">
                    <div class="view overlay d-flex justify-content-center">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" class="img-fluid" style="height: 300px;" alt="smaple image">
                        @else
                            <img src="{{ asset('uploads/no-img.png') }}" alt="" style="height: 300px;" class="img-fluid w-100">
                        @endif
                        <div class="mask flex-center rgba-black-strong">
                            <span class="text-white">+</span>
                        </div>
                    </div>
                    <h4 class="text-center py-2 m-0">{!! $item->title !!} </h4>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
