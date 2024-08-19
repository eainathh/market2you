<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListaDeComprasController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\MelhoresPrecosController;
use App\Http\Controllers\MinhasComprasController;
use App\Http\Controllers\RelatoriosController;
use App\Models\Categorias;
use App\Models\locais;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
// Home
Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Locais
Route::get('/locais',[LocalController::class, 'index'])->name('locais.index');
Route::post('/locais/store', [LocalController::class, 'store'])->name('locais.store');

// Categorias
Route::get('/categorias',[CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias',[CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}',[CategoriaController::class, 'destroy'])->name('categorias.destroy');


//Lista de Compras
Route::get('/compras',[ListaDeComprasController::class, 'index'])->name('lista.index');
Route::get('/compras/create', [ListaDeComprasController::class, 'create'])->name('lista.create');
Route::post('/compras/store',[ListaDeComprasController::class, 'store'])->name('compras.store');


// Minhas Compras
Route::get('/minhascompras',[MinhasComprasController::class,'index'])->name('minhascompras.index');
Route::get('/minhascompras/show/{id}',[MinhasComprasController::class,'show'])->name('minhascompras.show');

// Relatórios
Route::get('/relatorios',[RelatoriosController::class,'index'])->name('relatorios.index');

//Dashboard
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

//Busca melhores preços
Route::get('/melhoresprecos',[MelhoresPrecosController::class, 'index'])->name('melhoresprecos.index');
    

});






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
