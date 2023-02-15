<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Requests\StoreClienteRequest;
use App\Models\Cliente;    

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

//Usamos el mismo controlador para todas las rutas
Route::controller(ClientesController::class)->group(function(){
	
	//Ruta fichero raiz
	Route::get('/', "index")->name('home');

	//Ruta a crear cliente
	Route::get('/clientes/create', 'create')->name('clientes.create');

	//Ruta a persistir nuevo cliente
	Route::post('/clientes', 'store')->name('clientes.store');

	//Ruta a cliente especifico
	Route::get('/clientes/{cliente}', 'show')->name('clientes.show');

	//Ruta a updatear
	Route::patch('/clientes/{cliente}', 'update')->name('clientes.update');

	//Ruta a vista editar
	Route::get('/clientes/{cliente}/edit', 'edit')->name('clientes.edit');
	
	//Ruta a borrar cliente
	Route::delete('/clientes/{cliente}', 'destroy')->name('clientes.destroy');

});

