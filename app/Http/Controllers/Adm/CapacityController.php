<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CapacityController extends Controller
{
    public function index()
    {
        return view('adm.closures.index');
    }
}
