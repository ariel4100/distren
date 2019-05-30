<?php

namespace App\Http\Controllers;

use App\Content;
use App\Mail\ContactoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contacto(Request $request)
    {
        $data = $request->all();
        $contacto = Content::seccionTipo('contacto','texto')->first();
        $datos = json_decode($contacto->text);

        Mail::to('ariel.14.iyf@gmail.com')->send(new ContactoMail($data));
        ///Mail::to($datos->correo_2)->send(new ContactoMail($data));
        return back()->with('status', 'Correo enviado correctamente');
    }

    public function pedido(Request $request)
    {

    }
}
