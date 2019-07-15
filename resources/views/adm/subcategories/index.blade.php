@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a href="{{ route('subcategoria.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus-circle mx-1"></i>Añadir</a>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Orden</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($subcategorias as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->order }}</td>
                            <td>{{ $item->category->title ?? '' }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('subcategoria.edit',$item->id) }}"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('subcategoria.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Realmente desea eliminar este registro?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No hay registros</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
