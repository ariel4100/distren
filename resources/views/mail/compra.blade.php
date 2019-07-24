<!DOCTYPE html>
<html>
<body>
<h2>DISTREN</h2>

    <h3>Pedido</h3>
    <p>Enviado desde la web</p>
    <br>
<h3>Datos Personales</h3>
<ul>
    <li><strong>Nombre:</strong> {{$datos["nombre"]}} {{$datos["apellido"]}}</li>
    @if(!empty($datos["telefono"]))
        <li><strong>Télefono:</strong> {{$datos["telefono"]}}</li>
    @endif
    <li><strong>Domicilio:</strong> {{$datos["domicilio"] }}</li>
    <li><strong>Provincia:</strong> {{$datos["provincia"]}}</li>
    <li><strong>Localidad:</strong> {{$datos["localidad"]}}</li>
    <li><strong>Email:</strong> <a href="mailto:{{$datos['email']}}">{{$datos['email']}}</a></li>
</ul>
<br>
<h4>Productos:</h4>
<table style="width:100%">
    <thead>
    <th style="background: #dedede; text-align:left; padding: 5px;">Codigo</th>
    <th style="background: #dedede; text-align:left; padding: 5px;">Categoria</th>
    <th style="background: #dedede; text-align:left; padding: 5px;">Producto</th>
    <th style="background: #dedede; text-align:left; padding: 5px;">Precio</th>
    <th style="background: #dedede; text-align:left; padding: 5px;">Cantidad</th>
    <th style="background: #dedede; text-align:left; padding: 5px;">Subtotal</th>
    </thead>
    <tbody>
    @foreach($pedido as $p)
        <tr>
            <td style="border-bottom: 1px solid; padding: 5px;">{{ $p['producto']['code'] ?? '' }}</td>
            <td style="border-bottom: 1px solid; padding: 5px;">{{ $p['producto']['category']['title'] ?? '' }}</td>
            <td style="border-bottom: 1px solid; padding: 5px;">{{ $p['producto']['title'] ?? '' }}</td>
            <td style="border-bottom: 1px solid; padding: 5px;">{{ number_format($p['producto']['price'],2,",",".") ?? '' }}</td>
            <td style="border-bottom: 1px solid; padding: 5px;">{{ $p['qty'] ?? '' }}</td>
            <td style="border-bottom: 1px solid; padding: 5px;">{{ number_format(($p['producto']['price']*$p['qty']),2,",",".") }}</td>
            {{--<td style="border-bottom: 1px solid; padding: 5px;">{{$p->producto["producto"]}}</td>--}}
            {{--<td style="border-bottom: 1px solid; padding: 5px;">{{$p->producto->familia["cc"]}}</td>--}}
            {{--<td style="border-bottom: 1px solid; padding: 5px;">{{$p->cantidad}}</td>--}}
            {{--<td style="border-bottom: 1px solid; padding: 5px;">$ {{number_format($p["precio"],2,",",".")}}</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
<h3 style="text-align:right;padding: 5px">Sub Total: $ {{ number_format($compra["total"],2,",",".") ?? ''}}</h3>
<h3 style="text-align:right;padding: 5px">IVA (21%): $ {{ number_format($compra["total"]*0.21,2,",",".") ?? ''}}</h3>
<h3 style="text-align:right;padding: 5px">Total a pagar: $ {{ number_format($compra["total"]*1.21,2,",",".") ?? ''}}</h3>
</body>
</html>