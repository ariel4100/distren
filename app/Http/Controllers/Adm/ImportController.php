<?php

namespace App\Http\Controllers\adm;

use App\Imports\ProductImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function index(Request $request) {
//        set_time_limit(0);
        //dd($request->all());
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('capacities')->truncate();
        DB::table('closures')->truncate();
        DB::table('closure_product')->truncate();
//        DB::table('productoaplicaciones')->truncate();

        //dd($request->all());
        //$archivo = $request->file("archivo");
        try {
            Excel::import(new ProductImport,request()->file('file'));
        } catch (Exception $e) {
            return back()->withErrors(['status' => "Ocurrió un error"]);
        }
        return back()->withSuccess(['status' => "Carga finalizada"]);
    }
}
