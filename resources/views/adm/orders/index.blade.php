@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        <a href="{{ route('usuario.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus-circle mx-1"></i>Añadir</a>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Pago</th>
                        <th scope="col">Envio</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($clientes as $item)
                        <tr>
                            <td>{{ $item->name .' '. $item->surname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->transaction->payment }}</td>
                            <td>{{ $item->transaction->shipping }}</td>
                            <td>$ {{ $item->transaction->total }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#centralModalSm">
                                    <i class="far fa-eye"></i>
                                </button>

                                <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                     aria-hidden="true">

                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead class="distren-fondo white-text">
                                                    <tr>
                                                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Categoria</th>
                                                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Producto</th>
                                                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">ml/cm2</th>
                                                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                                                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cierre</th>
                                                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                                                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal Productos</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        @foreach($item->order as $pedido)
                                                            <td>{{ $pedido->name_category }}</td>
                                                            <td>{{ $pedido->name_product }}</td>
                                                            <td>{{ $pedido->cc }}</td>
                                                        @endforeach
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
