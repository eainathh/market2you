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





Auth::routes();
// Home
Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Locais
Route::get('/locais',[LocalController::class, 'index'])->name('locais.index');
Route::get('/getlocais',[LocalController::class, 'getlocais'])->name('locais.getlocais');
Route::post('/locais/store', [LocalController::class, 'store'])->name('locais.store');
Route::delete('/locais/{id}',[LocalController::class, 'destroy'])->name('locais.destroy');
Route::get('/editlocais/{id}',[LocalController::class, 'editlocais'])->name('locais.edit');
Route::put('/locais/{id?}', [LocalController::class, 'update'])->name('locais.update');

// Categorias
Route::get('/categorias',[CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/getcategorias',[CategoriaController::class, 'getcategorias'])->name('categorias.getcategorias');
Route::get('/editcategorias/{id}',[CategoriaController::class, 'categoriasEdit'])->name('categorias.edit');
Route::post('/categoriasstore',[CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/updatecategorias/{id?}', [CategoriaController::class, 'updateCategorias'])->name('categorias.update');
Route::get('/editcategorias/{id}', [CategoriaController::class, 'categoriasEdit'])->name('categorias.edit');
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
