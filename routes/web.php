<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*************************RUTAS PUBLICAS******************************/
Route::get('/','FrontendController@home')->name('home');
Route::get('empresa','FrontendController@empresa')->name('empresa');
Route::group([ 'prefix' => 'productos'],function (){
    Route::get('/','FrontendController@categorias')->name('categorias');
    Route::get('categoria/{id}','FrontendController@categoriaproductos')->name('categoria');
    Route::get('subcategoria/{id}','FrontendController@subcategoria')->name('subcategoria');
    Route::get('producto/{id}','FrontendController@producto')->name('producto');
});

Route::get('carrito','FrontendController@carrito')->name('carrito');
Route::get('confirmar','FrontendController@confirmar')->name('confirmar');
Route::get('ofertas','FrontendController@ofertas')->name('ofertas');
Route::get('contacto','FrontendController@contacto')->name('contacto');
Auth::routes();

/*************************MAILS******************************/
Route::post('enviar-contacto', 'MailController@contacto')->name('contacto.mail');


/*************************RUTAS ADM******************************/
Route::group([ 'middleware' => 'auth','prefix' => 'adm'],function (){
    Route::view('/',  'adm.dashboard.index');
    Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
        Route::get('{seccion}/create', ['uses' => 'Adm\SliderController@create', 'as' => '.create']);
        Route::post('store', ['uses' => 'Adm\SliderController@store', 'as' => '.store']);
        Route::get('{seccion}/list', ['uses' => 'Adm\SliderController@list', 'as' => '.list']);
        Route::get('edit/{slider}', ['uses' => 'Adm\SliderController@edit', 'as' => '.edit']);
        Route::post('update/{slider}', ['uses' => 'Adm\SliderController@update', 'as' => '.update']);
        Route::get('destroy/{slider}', ['uses' => 'Adm\SliderController@destroy', 'as' => '.destroy']);
    });
    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{section}/{tipo}', ['uses' => 'Adm\ContentController@index', 'as' => '.index']);
        Route::get('{section}/{tipo}/create', ['uses' => 'Adm\ContentController@create', 'as' => '.create']);
        Route::post('/store', ['uses' => 'Adm\ContentController@store', 'as' => '.store']);
        Route::get('{section}/{contenido}/edit', ['uses' => 'Adm\ContentController@edit', 'as' => '.edit']);
        Route::put('{contenido}/update', ['uses' => 'Adm\ContentController@update', 'as' => '.update']);
        Route::get('/eliminar/lista/{section}/{contenido}', ['uses' => 'Adm\ContentController@delete', 'as' => '.delete']);
    });
    // GALERIAS DE PRODUCTOS
    Route::group(['prefix' => 'galeria', 'as' => 'galeria'], function() {
        Route::get('{id}', ['uses' => 'Adm\GaleryController@index', 'as' => '.index']);
        Route::get('crear/galeria/{id}', ['uses' => 'Adm\GaleryController@create', 'as' => '.create']);
        Route::post('/store', ['uses' => 'Adm\GaleryController@store', 'as' => '.store']);
        Route::get('{id}/edit', ['uses' => 'Adm\GaleryController@edit', 'as' => '.edit']);
        Route::put('{contenido}/update', ['uses' => 'Adm\GaleryController@update', 'as' => '.update']);
        Route::get('{id}/destroy', ['uses' => 'Adm\GaleryController@destroy', 'as' => '.destroy']);
    });
   /* Route::group(['prefix' => 'pedidos', 'as' => 'pedidos'], function() {
        Route::get('pedidos', ['uses' => 'Adm\OrderController@index', 'as' => '.index']);

    });*/

    Route::get('ventas','Adm\OrderController@index')->name('ventas.index');

    Route::resource('cierres','Adm\ClosureController');
    Route::resource('capacidades','Adm\CapacityController');
    Route::resource('terminaciones','Adm\TerminationController');
    Route::resource('categoria','Adm\CategoryController');
    Route::resource('subcategoria','Adm\SubcategoryController');
    Route::resource('productos','Adm\ProductController');
    Route::resource('metadatos','Adm\MetadataController');
    Route::get('meta/{id}','Adm\MetadataController@eliminar')->name('metadato.eliminar');
    Route::resource('usuario','Adm\UserController');

});

//api
Route::post('api/addproduct','Adm\ProductController@apiAddProduct');
Route::post('api/updateproduct','Adm\ProductController@apiUpdateProduct');
Route::post('api/confirmar','Adm\OrderController@confirmar');
Route::post('api/productos','Adm\ProductController@productos');
Route::get('api/presentaciones','Adm\ProductController@presentaciones');