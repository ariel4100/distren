<?php

namespace App\Http\Controllers\adm;

use App\Capacity;
use App\Category;
use App\Closure;
use App\GroupProduct;
use App\Imports\ProductImport;
use App\Product;
use App\Subcategory;
use App\Termination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
//            $file = storage_path('app/'.$file);
            $reader = new ReaderXlsx();
            $spreadsheet = $reader->load($file);
            $sheet = $spreadsheet->getActiveSheet();
//            dd(Storage::url($file));
            $rows = $sheet->toArray();
            $col2 = [];
            foreach ($rows as $k => $row)
            {
                if ($k == 0)
                {


                }else{
//                    dd($row);
//                    $cierre = Closure::firstOrCreate([
//                        'title' => $row[6],
//                    ]);
//                    $terminacion = Termination::firstOrCreate([
//                        'title' => $row[4],
//                    ]);

                    $familia = Category::firstOrCreate([
                        'title' => $row[1]
                    ]);

                    $subfamily = Subcategory::firstOrCreate([
                        'title' => $row[2],
                        'category_id' => $familia->id,
                    ]);

                    $group_products = GroupProduct::firstOrCreate([
                        'title' => $row[3],
                        'category_id' => $familia->id,
                        'subcategory_id' => $subfamily->id,
                    ]);

                    $precio = str_replace(".","",$row[7]);
                    $precio = str_replace(",",".",$row[7]);
                    $precio = str_replace("$","",$row[7]);
                    $precio_oferta = str_replace(".","",$row[8]);
                    $precio_oferta = str_replace(",",".",$row[8]);
                    $precio_oferta = str_replace("$","",$row[8]);

                    $producto = Product::firstOrCreate([
                        'code' => $row[0],
                        'title' => $row[6],
                        'category_id' => $familia->id,
                        'subcategory_id' => $subfamily->id,
                        'group_product_id' => $group_products->id,
                        'price' => floatval($precio),
                        'price_offer' => floatval($precio_oferta),
                        'offer' => $row[10] == 'SI' ? true : false,
                        'featured' => $row[11] == 'SI' ? true : false,
                    ]);

//                    DB::table('closure_product')->updateOrInsert([
//                        'closure_id' => $cierre->id,
//                        'product_id' => $producto->id,
//                    ]);
//                    DB::table('product_termination')->updateOrInsert([
//                        'termination_id' => $terminacion->id,
//                        'product_id' => $producto->id,
//                    ]);
//                    $producto->closure()->sync($cierre->id);
//                    $producto->termination()->sync($terminacion->id);


//                    dd(floatval($item));
//                    $capacidad = Capacity::firstOrCreate([
//                        'cc' => $row[5],
//                        'price' => floatval($precio),
//                        'price_offer' => floatval($precio_oferta),
////                        'offer' => $row[10] == 'si' ? true : false,
//                        'product_id' => $producto->id,
//                    ]);
                }
            }

            return back()->with('status', "Carga finalizada");
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

    }
}
