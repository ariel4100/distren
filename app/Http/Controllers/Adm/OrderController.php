<?php

namespace App\Http\Controllers\Adm;

use App\Client;
use App\Mail\OrderMail;
use App\Order;
use App\Price;
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
        $status = array('pendiente','procesado');

        return view('adm.orders.index',compact('pedidos','clientes','status'));
    }

    public function store(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);
        $transaction->status = $request->status;
        $transaction->save();
        return back();
    }


    public function confirmar(Request $request)
    {
//        return $request->all();
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
            'cuit' => $datos['cuit'],
            'transaction_id' => $transaccion->id,
        ]);

        foreach ($pedido as $p)
        {
//            return $p;
            $pedidos = Order::create([
                'name_category' => $p['producto']['category']['title'],
                'name_product' => $p['producto']['title'],
                'cc' => $p['producto']['code'],

                'price_cc' => $p['producto']['price'],
                'price_offer' => $p['producto']['offer'] ? $p['producto']['price_offer'] : null,


                'quantity_cc' => $p['qty'],

                'transaction_id' => $transaccion->id,
                'client_id' => $cliente->id,
            ]);
        }

        //DESCONTAR EL STOCK A CADA PRESENTACION DE LOS PEDIDOS

//        foreach ($pedidos as $pedido)
//        {
//
//        }
//        $precio_cc = Price::

        Mail::to('ariel.14.iyf@gmail.com')->send(new OrderMail($request->all()));
        return $pedidos;
    }
}
