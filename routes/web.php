<?php

use Illuminate\Support\Facades\Route;

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
//Site Capa
Route::get('/index', [\App\Http\Controllers\SiteController::class,'index'])->name('index');

//Categorias
Route::post('/createcategoria', [App\Http\Controllers\HomeController::class, 'createcategoria'])->name('createcategoria');
Route::get('/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
//Produtos
Route::get('/produtos', [App\Http\Controllers\HomeController::class, 'produtos'])->name('produtos');
Route::post('/criaproduto', [App\Http\Controllers\HomeController::class, 'criaproduto'])->name('criaproduto');
Route::get('/produtoimage/{id}', [App\Http\Controllers\HomeController::class, 'produtoimage'])->name('produtoimage');
Route::post('/uploadimage/', [App\Http\Controllers\HomeController::class, 'uploadimage'])->name('uploadimage');
Route::get('/showproduto/{id}', [App\Http\Controllers\HomeController::class, 'showproduto'])->name('showproduto');
Route::get('/apagarproduto/{id}', [App\Http\Controllers\HomeController::class, 'apagarproduto'])->name('apagarproduto');
Route::get('/apagarprodutoimagem/{id}', [App\Http\Controllers\HomeController::class, 'apagarprodutoimagem'])->name('apagarprodutoimagem');
Route::get('/destaque/{id}', [App\Http\Controllers\HomeController::class, 'destaque'])->name('destaque');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categoria', [App\Http\Controllers\HomeController::class, 'categoria'])->name('categoria');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
