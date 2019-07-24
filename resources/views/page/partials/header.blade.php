<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="d-flex justify-content-end">
                <form action="{{ route('buscador') }}" method="get" class="">
                    <div class="md-form m-0 d-flex align-items-center">
                        <i class="fas fa-search distren-color fa-1x"></i>
                        <input type="text" placeholder="¿Qué estás buscando?" name="name" class="form-control ml-2 my-0 py-1">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white py-0" style="box-shadow: unset; ">
<div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset($logos->image_2 ?? '') }}" alt="" style="/*height: 50px*/" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('empresa') ? 'activo' : '' }}" href="{{ route('empresa') }}">Empresa</a></li>
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('familias*') ? 'activo' : '' }}" href="{{ route('categorias') }}">Productos</a></li>
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('ofertas') ? 'activo' : '' }}" href="{{ route('ofertas') }}">Ofertas</a></li>
            <li class="nav-item"><a class="nav-link h5 ml-3 text-uppercase {{ request()->is('contacto') ? 'activo' : '' }}" href="{{ route('contacto') }}">Contacto</a></li>
            <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link h5 ml-3 text-uppercase distren-fondo {{ request()->is('carrito') ? 'activo' : '' }}" href="{{ route('carrito') }}"><i class="fas fa-shopping-cart text-white"></i> Carrito</a></li>
        </ul>
    </div>
</div>
</nav>