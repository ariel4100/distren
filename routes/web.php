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
Route::get('/','FrontendController@home')->name('home');
Route::get('empresa','FrontendController@empresa')->name('empresa');
Route::group([ 'prefix' => 'productos'],function (){
    Route::get('/','FrontendController@categorias')->name('categorias');
    Route::get('categoria/{id}','FrontendController@categoriaproductos')->name('categoria');
    Route::get('producto/{id}','FrontendController@producto')->name('producto');
});


Route::get('carrito','FrontendController@carrito')->name('carrito');
Route::get('ofertas','FrontendController@ofertas')->name('ofertas');
Route::get('contacto','FrontendController@contacto')->name('contacto');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'prefix' => 'adm'],function (){
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
    // GALERIAS DE NEWS
    /*Route::group(['prefix' => 'galeria', 'as' => 'galeria'], function() {
        Route::get('{id}', ['uses' => 'Adm\GaleryController@index', 'as' => '.index']);
        Route::get('crear/galeria/{id}', ['uses' => 'Adm\GaleryController@create', 'as' => '.create']);
        Route::post('/store', ['uses' => 'Adm\GaleryController@store', 'as' => '.store']);
        Route::get('{id}/edit', ['uses' => 'Adm\GaleryController@edit', 'as' => '.edit']);
        Route::put('{contenido}/update', ['uses' => 'Adm\GaleryController@update', 'as' => '.update']);
        Route::get('{id}/destroy', ['uses' => 'Adm\GaleryController@destroy', 'as' => '.destroy']);
    });*/
   /* Route::group(['prefix' => 'pedidos', 'as' => 'pedidos'], function() {
        Route::get('pedidos', ['uses' => 'Adm\OrderController@index', 'as' => '.index']);

    });*/

    Route::resource('cierres','Adm\ClosureController');
    Route::resource('capacidades','Adm\CapacityController');
//    Route::resource('terminaciones','Adm\TController');
    Route::resource('categoria','Adm\CategoryController');
    Route::resource('productos','Adm\ProductController');
    Route::resource('metadatos','Adm\MetadataController');
    Route::get('meta/{id}','Adm\MetadataController@eliminar')->name('metadato.eliminar');
    Route::resource('usuario','Adm\UserController');


});

//api
Route::post('api/addproduct','Adm\ProductController@apiAddProduct');
Route::post('api/updateproduct','Adm\ProductController@apiUpdateProduct');

Route::post('api/productos','Adm\ProductController@productos');