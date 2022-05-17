<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;

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

// IndexController é single action, significa que não precisa passar o método.
Route::get('/', IndexController::class);

Route::resource('/user', UserController::class);\

// criar um grupo
// definir o namespace para ele encontrar a pasta
// lembrar de colocar um . em um dos names, para ele combinar as strings e criar as rotas posts.create e posts.store
Route::prefix('admin')->namespace('admin')->group(function () {
    Route::get('teste', function())
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
    });
});

Route::resource('/user', UserController::class);\























// rota, nomeController@metodo
Route::get('hello-world', [HelloWorldController::class], 'index');

Route::post('hello-world', []);

Route::match(['post', 'get'], 'teste-rota', function () {
    echo "Entrou na rota com match";
});

Route::any('teste-any', function () {
    echo "Esta rota é indiferente ao verbo HTTP";
});

// Sem precisar criar um controller, usando a função de callback para exibir uma view.
Route::view('boas-vindas', 'hello_world.index');


// Receber parâmetro da url pela função de callback: usar o nome da variável igual
// Visualmente melhor do que usar ?id
Route::get('post/excluir/{id}', function ($id) {
    return $id;
});

Route::get('post/excluir2/{id}', [HelloWorldController::class, 'retornaId']);

Route::get('post/{excluir?}', [HelloWorldController::class, 'retornaId2']);

// Usar regex nas rotas: só encontra o caminho se o parâmetro for compatível
Route::get('post/{id}', [HelloWorldController::class, 'retornaId'])->where(['id' => '[0-9]+']);

Route::get('ola', [HelloWorldController::class, 'index'])->name('ola-nome');



// Prefixos
// todas as uris começarão com 'avisos'
// Passar para uma função anônima todas as rotas que terão o prefixo.
Route::prefix('avisos')->group(function () {
    Route::get('/', function () {
        echo "index";
    });

    Route::put('criar', function () {
        echo "criar";
    });

    Route::get('exibr', function () {
        echo "exibr";
    });

    Route::delete('apagar', function () {
        echo "apagar";
    });
});
