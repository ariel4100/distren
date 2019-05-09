<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="d-flex justify-content-end">
                <div class=" ">
                    <div class="md-form m-0">
                        <i class="fas fa-search distren-color prefix"></i>
                        <input type="text" placeholder="¿Qué estás buscando?" class="form-control my-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php($logos = \App\Content::seccionTipo('logos','texto')->first())
@php($data = json_decode($logos->text))
<nav class="navbar navbar-expand-lg navbar-light bg-white py-0" style="box-shadow: unset; ">
<div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{!! asset($data->image_2) !!}" alt="" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('empresa') ? 'activo' : '' }}" href="{{ route('empresa') }}">Empresa</a></li>
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('productos') ? 'activo' : '' }}" href="{{ route('productos') }}">Productos</a></li>
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('ofertas') ? 'activo' : '' }}" href="{{ route('ofertas') }}">Ofertas</a></li>
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('contacto') ? 'activo' : '' }}" href="{{ route('contacto') }}">Contacto</a></li>
            <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link h5 ml-3 text-uppercase distren-fondo {{ request()->is('contacto') ? 'activo' : '' }}" href="{{ route('contacto') }}"><i class="fas fa-shopping-cart text-white"></i> Carrito</a></li>
        </ul>
    </div>
</div>
</nav>