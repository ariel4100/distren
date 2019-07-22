<nav>
    <ol class="list-unstyled d-flex">
        <li class="ml-2"><a href="{{ route('categorias') }}" class="" style="color: unset;">Productos</a></li>
        <li class="ml-2">| @if(isset($categoria))<a href="{{ route('categoria',$categoria->id) }}" class="" style="color: unset;">{{  ucwords(strtolower($categoria->title)) }} </a> @endif</li>
        <li class="ml-2">|  @if(isset($producto))<a href="{{ route('producto',$producto->id) }}" class="" style="color: unset;">{{ ucwords(strtolower($producto->title)) }}</a>@endif</li>
    </ol>
</nav>