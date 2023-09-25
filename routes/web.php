<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;

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



Route::get('/quemsomos', function () {
    return 'Quem Somos';
});

Route::get('/contato', function () {
    return 'Essa rota não esta disponivel, envie o formulário da pagina principal para acessar essa pagina';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// slide 52
Route::prefix('/admin')-> group (function(){
    Route::get('/clientes', function() {return 'Clientes';});
    // slide 76
    Route::get('/fornecedores', [FornecedorController::class, 'principal'])->name('admin.fonercedores');
    Route::get('/produtos', function() {return 'Produtos';});
});

// slide 27 e 57
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobrenos', [SobreNosController::class, 'principal'])->name('site.sobrenos');
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');

// slide 62
Route::fallback(function() {
    echo 'a rota não exite <a href= "'.route(site.index).'"> Clique aqui </a> ';
});

// slide 61
Route::get('admin', function(){
    return redirect()->route('site.index');
});