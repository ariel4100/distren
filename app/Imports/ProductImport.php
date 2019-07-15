<?php

namespace App\Imports;

use App\Capacity;
use App\Category;
use App\Closure;
use App\Price;
use App\Product;
use App\Subcategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    public function model(Array $row)
    {
        //dd($row);
//        $familia        = $row[0];
//        $subfamilia     = $row[1];
//        $producto       = $row[2];
//        $terminacion    = $row[3];
//        $capacidad      = $row[4];
//        $cierre         = $row[5];
//        $precio         = $row[6];
//        $precio_oferta  = $row[7];
//        $destacado      = $row[8];
//        $oferta         = $row[9];

        //dd($row);
        if (!isset($row[0])) {
            return null;
        }

        $f = Category::firstOrCreate([
            'title' => $row[0]
        ]);

        if (!isset($row[1])) {
            return null;
        }
        $sf = Subcategory::firstOrCreate([
            'title' => $row[1]
        ]);


        $p = Product::firstOrCreate([
            'title' => $row[2],
            'category_id' => $f->id,
            'subcategory_id' => $sf->id,
        ]);

//        $c = Capacity::firstOrCreate([
//            'cc' => $row[3],
//        ]);
//        $p->capacity()->sync($c->id);

//        $closure = Closure::firstOrCreate([
//            'title' => $row[5],
//
//        ]);
        //dd($closure);
//
//        DB::table('closure_product')->updateOrInsert([
//            'closure_id' => $closure->id,
//            'product_id' => $p->id,
//        ]);

        //dd($p);
        //$p->closure()->sync($closure->id);

//        $price = Price::firstOrCreate([
//            'product_id' => $p->id,
//            'capacity_id' => $c->id,
//            'price' => is_numeric($row[4]) ? $row[4] : null,
//            'offer_price' => isset($item['offerprice']) ?$item['offerprice'] : null,
//            'quantity' => isset($item['quantity']) ? $item['quantity'] : null,
//        ]);
//        $buscar_familia = Category::where("title","LIKE","%{$row[0]}%")->first();
//        //si no esta vacio entra
//        if(!empty($buscar_familia))
//            $marca_id = '';
//        else {
//            $family = Category::create([
//                'title' => $row[0],
//            ]);
//        }
//        $buscar_producto = Product::where("title","LIKE","%{$row[1]}%")->first();
//        //si no esta vacio entra
//        if(!empty($buscar_producto))
//            $marca_id = '';
//        else {
//            $product = Product::create([
//                'title' => $row[1],
//                'category_id' => $family->id,
//            ]);
//        }

        if (!ini_get('display_errors')) {
            ini_set('display_errors', '1');
        }

          return $p;
    }
}
