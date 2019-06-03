<?php

namespace App\Http\Controllers\Adm;

use App\Client;
use App\Mail\OrderMail;
use App\Order;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $pedidos = Order::orderBy('id','desc')->get();
        $clientes = Client::orderBy('id','desc')->get();

        return view('adm.orders.index',compact('pedidos','clientes'));
    }

    public function confirmar(Request $request)
    {
//      return $request->all();

        $datos = $request->datos;
        $compra = $request->compra;
        $pedido = $request->pedido;
        $transaccion = Transaction::create([
            'shipping' => $compra['envio'],
            'payment' => $compra['pago'],
            'total' => $compra['total'],
        ]);
        $cliente = Client::create([
            'name' => $datos['nombre'],
            'surname' => $datos['apellido'],
            'email' => $datos['email'],
            'address' => $datos['domicilio'],
            'location' => $datos['localidad'],
            'province' => $datos['provincia'],
            'phone' => $datos['telefono'],
            'transaction_id' => $transaccion->id,
        ]);

        foreach ($pedido as $p)
        {

            $pedidos = Order::create([
                'name_category' => $p['categoria'],
                'name_product' => $p['producto'],
                'cc' => $p['cc']['cc'],
                'price_cc' => $p['precio_cc'],
                'quantity_cc' => $p['cantidad_cc'],
                'name_closure' => $p['tipo_cierre']['title'],
                'price_closure' => $p['tipo_cierre']['price'],
                'closure_cc' => $p['cantidad_cierre'],
                'transaction_id' => $transaccion->id,
                'client_id' => $cliente->id,
            ]);
        }


        //Mail::to('ariel.14.iyf@gmail.com')->send(new OrderMail($data));
        return $pedido;
    }
}
