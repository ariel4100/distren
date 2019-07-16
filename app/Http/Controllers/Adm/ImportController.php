<?php

namespace App\Http\Controllers\adm;

use App\Capacity;
use App\Category;
use App\Closure;
use App\Imports\ProductImport;
use App\Product;
use App\Subcategory;
use App\Termination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xls as WriterXls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;

class ImportController extends Controller
{

    public function index(Request $request) {

        set_time_limit(0);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('subcategories')->truncate();
        DB::table('capacities')->truncate();
        DB::table('closures')->truncate();
        DB::table('closure_product')->truncate();

        if ($request->hasFile('file')) {
            $file = $request->file('file')->storeAs('public/excel', Str::random(4).'-'.$request->file('file')->getClientOriginalName());
            $file = storage_path('app/'.$file);
            $reader = new ReaderXlsx();
            $spreadsheet = $reader->load($file);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();
            $col2 = [];
            foreach ($rows as $k => $row)
            {
                if ($k == 0)
                {


                }else{
//                    dd($row);
                    $cierre = Closure::firstOrCreate([
                        'title' => $row[6],
                    ]);
                    $terminacion = Termination::firstOrCreate([
                        'title' => $row[4],
                    ]);

                    $familia = Category::firstOrCreate([
                        'title' => $row[1]
                    ]);

                    $subfamily = Subcategory::firstOrCreate([
                        'title' => $row[2],
                        'category_id' => $familia->id,
                    ]);
                    $producto = Product::firstOrCreate([
                        'title' => $row[3],
                        'category_id' => $familia->id,
                        'subcategory_id' => $subfamily->id,
                        'offer' => $row[10] == 'si' ? true : false,
                        'featured' => $row[11] == 'si' ? true : false,
                    ]);
                    $producto->closure()->sync($cierre->id);
                    $producto->termination()->sync($terminacion->id);
                    $item = str_replace(".","",$row[7]);
                    $item = str_replace(",",".",$row[7]);
                    $item = str_replace("$","",$row[7]);
//                    dd(floatval($item));
                    $capacidad = Capacity::firstOrCreate([
                        'cc' => $row[5],
                        'price' => floatval($item),
                        'price_offer' => floatval($row[8]),
                        'offer' => $row[10] == 'si' ? true : false,
                        'product_id' => $producto->id,
                    ]);
                }
            }

        }


//        ini_set('memory_limit', '-1');

//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        DB::table('products')->truncate();
//        DB::table('categories')->truncate();
//        DB::table('capacities')->truncate();
//        DB::table('closures')->truncate();
//        DB::table('closure_product')->truncate();
//        DB::table('productoaplicaciones')->truncate();

//        //dd($request->all());
//        $archivo = $request->file("file");
//        //dd($archivo);
//        try {
//            Excel::import(new ProductImport,$archivo);
//        } catch (Exception $e) {
//            return back()->withErrors(['status' => "Ocurrió un error"]);
//        }
        return back()->withSuccess(['status' => "Carga finalizada"]);
    }
}
