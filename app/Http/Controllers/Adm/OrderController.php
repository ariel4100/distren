<?php

namespace App\Http\Controllers\Adm;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function confirmar(Request $request)
    {

        $data = $request->all();
        Mail::to('ariel.14.iyf@gmail.com')->send(new OrderMail($data));
        return $request->all();
    }
}
