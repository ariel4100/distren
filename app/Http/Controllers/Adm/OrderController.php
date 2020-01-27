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
//        Mail::to('arielcallisaya00@gmail.com')->send(new OrderMail($request->all()));
        Mail::to('ventas@distren.com.ar')->send(new OrderMail($request->all()));


        if ($compra['pago'] == 'MP'){
            \MercadoPago\SDK::setClientId(env('MERCADOPAGO_CLIENTE_ID'));
            \MercadoPago\SDK::setClientSecret(env('MERCADOPAGO_CLIENTE_SECRET'));
            if (config('app.debug')){
                \MercadoPago\SDK::setAccessToken("TEST-954396773036722-012715-8ceed7f3a41ce1c3f1eefad51dd8a83b-361003363");
            }

            $preference = new \MercadoPago\Preference();
            $items[] = [
                'id' => 1,
                'category_id' => 'DISTREN',
                'title' => 'Compra en DISTREN',
                'description' => 'Producto de DISTREN',
                'picture_url' => 'http://osolelaravel.com/distren/uploads/logos/texto/zebUI2yO08QFgEjAb2bzfCmMKl8gZMnPA78oVur9.png',
                'quantity' => 1,
                'currency_id' => 'ARS',
                'unit_price' => $compra['total'] ?? 0
            ];


            $preference->items = $items;
            $preference->external_reference = 1;
            $preference->auto_return = "approved";
            $preference->back_urls = array(
                "success" => route('pago.exitoso'),
                "failure" => url('/'),
                "pending" => url('/')
            );
            $preference->save();
            return response()->json([
                'mp' => $preference->init_point,
            ]);
        }

        return response()->json([
            'no_mp' => 1,
        ]);
    }
}
