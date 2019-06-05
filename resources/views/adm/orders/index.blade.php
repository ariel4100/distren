@extends('adm.layouts.app')
@section('style')
    <style>
    P{
        margin-bottom:1px;
    }
    table{
        border-bottom: 2px solid #8BBF40 ;
    }
    thead td{
        text-align: center;
    }
        b{
            font-weight: bold;
        }
    </style>
@stop
@section('content')
    <div class="container p-4">
        {{--<a href="{{ route('usuario.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus-circle mx-1"></i>Añadir</a>--}}
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Pago</th>
                        <th scope="col">Envio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($clientes as $key=>$item)
                        <tr>
                            <td>#0{{ $item->id }}</td>
                            <td>{{ $item->name .' '. $item->surname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->transaction->payment }}</td>
                            <td>{{ $item->transaction->shipping }}</td>
                            <td>
                                @if($item->transaction->status == 'pendiente')
                                    <span class="badge badge-warning">{{ strtoupper($item->transaction->status) }}</span>
                                @else
                                    <span class="badge badge-success">{{ strtoupper($item->transaction->status) }}</span>
                                @endif
                            </td>
                            <td>$ {{ number_format($item->transaction->total*1.21,2,',','.') }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_order_{{$key}}">
                                    <i class="far fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th>No hay registros</th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                @foreach($clientes as $key=>$item)
                    <div class="modal fade" id="modal_order_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form action="{{ route('order.store')}}" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title w-100" id="myModalLabel">Orden de Compra</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-between">
                                        <div class="col-md-6">
                                            <h5 class="mb-3">DATOS DEL CLIENTE:</h5>
                                            <p><b class="font-weight-bold">NOMBRE Y APELLIDO: </b> {{ $item->name .' '. $item->surname }}</p>
                                            <p><b class="font-weight-bold">CUIT: </b> {{ $item->cuit }}</p>
                                            <p><b class="font-weight-bold">DOMICILIO: </b> {{ $item->address }}</p>
                                            <p><b class="font-weight-bold">PROVINCIA: </b> {{ $item->province }}</p>
                                            <p><b class="font-weight-bold">LOCALIDAD: </b> {{ $item->location }}</p>
                                            <p><b class="font-weight-bold">TELEFONO: </b> {{ $item->phone }}</p>
                                            <p><b class="font-weight-bold">EMAIL: </b> <a href="mailto:{{ $item->email }}" class=" ">{{ $item->email }}</a></p>

                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-3">ESTADO:</h5>
                                            <input type="text" class="d-none" value="{{ $item->transaction->id}}" name="transaction_id">
                                                @csrf
                                                <div class="form-group">
                                                    <select name="status" id="" class="custom-select">
                                                        @foreach($status as $s)
                                                        <option value="{{ $s }}" {{ $item->transaction->status == $s ? 'selected' : null }}>{{ $s }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            <p><b class="font-weight-bold">PEDIDO: </b> #0{{ $item->id }}</p>
                                            <p><b class="font-weight-bold">FECHA DE COMPRA: </b> {{ $item->transaction->created_at}}</p>
                                            <p><b class="font-weight-bold">FORMA DE ENVIO: </b> {{ $item->transaction->shipping }}</p>
                                            <p><b class="font-weight-bold">FORMA DE PAGO: </b> {{ $item->transaction->payment }}</p>
                                            <p><b class="font-weight-bold">TOTAL: </b>${{ number_format($item->transaction->total*1.21,2,',','.') }}</p>
                                        </div>
                                        <div class="col-md-12"  >
                                            <table class="table mt-5">
                                                <thead class="distren-fondo white-text">
                                                <tr>
                                                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Categoria</th>
                                                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Producto</th>
                                                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cantidad</th>
                                                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Terminaciones</th>
                                                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cierre</th>
                                                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cantidad</th>
                                                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($item->order as $pedido)
                                                    <tr>
                                                        @if($pedido->price_offer)
                                                        <td>{{ $pedido->name_category }}</td>
                                                        <td style="width: 170px;">
                                                            {{ $pedido->name_product }}
                                                            <p class="m-0"><b>Capacidad: </b>{{ $pedido->cc }}</p>
                                                            <p class="m-0"><b>Precio: </b>${{ number_format($pedido->price_offer,2,',','.') }}</p>
                                                        </td>
                                                        <td>{{ $pedido->quantity_cc }}</td>
                                                        <td style="width: 170px;">
                                                            {{ $pedido->name_termination }}
                                                            <p class="m-0"><b>Precio: </b>${{ number_format($pedido->price_termination,2,',','.') }}</p>
                                                        </td>
                                                        <td style="width: 170px;">
                                                            {{ $pedido->name_closure }}
                                                            <p class="m-0"><b>Precio: </b>${{ number_format($pedido->price_closure,2,',','.') }}</p>
                                                        </td>
                                                        <td>{{ $pedido->quantity_closure }}</td>

                                                            <td>${{ number_format(($pedido->quantity_cc*$pedido->price_offer) + ($pedido->quantity_cc*$pedido->price_termination) + ($pedido->quantity_closure*$pedido->price_closure),2,',','.') }}</td>
                                                        @else
                                                            <td>{{ $pedido->name_category }}</td>
                                                            <td style="width: 170px;">
                                                                {{ $pedido->name_product }}
                                                                <p class="m-0"><b>Capacidad: </b>{{ $pedido->cc }}</p>
                                                                <p class="m-0"><b>Precio: </b>${{ number_format($pedido->price_cc,2,',','.') }}</p>
                                                            </td>
                                                            <td>{{ $pedido->quantity_cc }}</td>
                                                            <td style="width: 170px;">
                                                                {{ $pedido->name_termination }}
                                                                <p class="m-0"><b>Precio: </b>${{ number_format($pedido->price_termination,2,',','.') }}</p>
                                                            </td>
                                                            <td style="width: 170px;">
                                                                {{ $pedido->name_closure }}
                                                                <p class="m-0"><b>Precio: </b>${{ number_format($pedido->price_closure,2,',','.') }}</p>
                                                            </td>
                                                            <td>{{ $pedido->quantity_closure }}</td>
                                                            <td>${{ number_format(($pedido->quantity_cc*$pedido->price_cc) + ($pedido->quantity_cc*$pedido->price_termination) + ($pedido->quantity_closure*$pedido->price_closure),2,',','.') }}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4 offset-md-8">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="">Sub Total</h5>
                                                <h5 class="">$ {{ number_format($item->transaction->total,2,',', '.') }}</h5>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h5 class="">IVA (21%)</h5>
                                                <h5>${{ number_format($item->transaction->total*0.21,2,',', '.') }}</h5>
                                            </div>
                                            {{--<div class="d-flex justify-content-between">--}}
                                                {{--<h5 class="">Envio</h5>--}}
                                                {{--<h5>$700</h5>--}}
                                            {{--</div>--}}
                                            <div class="d-flex justify-content-between align-item-center mt-3">
                                                <h5 class="distren-color m-0">Total a pagar</h5>
                                                <h5 class="m-0 text-dark">${{ number_format($item->transaction->total*1.21,2,',', '.') }}</h5>
                                            </div>
                                            <hr class="distren-fondo">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Guardar Cambios</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
