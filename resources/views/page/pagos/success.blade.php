@extends('page.layouts.app')

@section('content')
    <div class="container my-5 py-5">
        <div class="alert alert-success" role="alert">
            <h2>Pago realizado exitosamente!!</h2>
        </div>
    </div>

@endsection
@section('script')
    <script>
        setTimeout(function(){
            location.href = '{{ url('/') }}';
        }, 3000);

    </script>
@endsection
