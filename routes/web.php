<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\fabricante;
use App\Http\Controllers\categoria;
use App\Http\Controllers\cliente;
use App\Http\Controllers\producto;
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



Route::get('/', function () {

    return view('welcome');

});


/* Fabricante */
Route::get('/fabricante/getFabricantes', [fabricante::class, 'index'])
->name('fabricante.index');

Route::get('/fabricante/verDetalles/{id}', [fabricante::class, 'show'])
->name('fabricante.show');


Route::get('/fabricante/new', [fabricante::class, 'create'])
->name('fabricante.new');

Route::post('/fabricante/new', [fabricante::class, 'store'])
->name('fabricante.store');

Route::delete('/fabricante/delete/{id}', [fabricante::class, 'delete'])
->name('fabricante.delete');

Route::get('/fabricante/edit/{id}', [fabricante::class, 'edit'])
->name('fabricante.edit');

Route::put('/fabricante/update/{id}', [fabricante::class, 'update'])
->name('fabricante.update');


/*Categoria */

Route::get('/categoria/getCategorias', [categoria::class, 'index'])
->name('categoria.index');


Route::get('/categoria/new', [categoria::class, 'create'])
->name('categoria.new');

Route::post('/categoria/new', [categoria::class, 'store'])
->name('categoria.store');

Route::delete('/categoria/delete/{id}', [categoria::class, 'delete'])
->name('categoria.delete');

Route::get('/categoria/edit/{id}', [categoria::class, 'edit'])
->name('categoria.edit');

Route::put('/categoria/update/{id}', [categoria::class, 'update'])
->name('categoria.update');



/* Cliente */
Route::get('/cliente/getClientes', [cliente::class, 'index'])
->name('cliente.index');

Route::get('/cliente/verDetalles/{id}', [cliente::class, 'show'])
->name('cliente.show');


Route::get('/cliente/new', [cliente::class, 'create'])
->name('cliente.new');

Route::post('/cliente/new', [cliente::class, 'store'])
->name('cliente.store');

Route::delete('/cliente/delete/{id}', [cliente::class, 'delete'])
->name('cliente.delete');

Route::get('/cliente/edit/{id}', [cliente::class, 'edit'])
->name('cliente.edit');

Route::put('/cliente/update/{id}', [cliente::class, 'update'])
->name('cliente.update');

/* Producto */

Route::get('/producto/getProductos', [producto::class, 'index'])
->name('producto.index');

Route::delete('/producto/delete/{id}', [producto::class, 'delete'])
->name('producto.delete');


Route::get('/producto/verDetalles/{id}', [producto::class, 'show'])
->name('producto.show');

Route::get('/producto/new', [producto::class, 'create'])
->name('producto.new');

Route::post('/producto/new', [producto::class, 'store'])
->name('producto.store');


Route::get('/producto/buyers/{id}', [producto::class, 'buyer'])//compradores
->name('producto.buyer');


Route::post('/producto/storeBuyer/{id}', [producto::class, 'storeBuyer'])
->name('producto.storeBuyer');


Route::get('/producto/edit/{id}', [producto::class, 'edit'])
->name('producto.edit');

Route::put('/producto/update/{id}', [producto::class, 'update'])
->name('producto.update');