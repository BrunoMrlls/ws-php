<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' =>  'api'], function () use ($router){

    $router->get('categorias', ['uses' => 'CategoriaController@listar']);
    $router->get('categoria/{id}', ['uses' => 'CategoriaController@buscar']);
    $router->post('categorias', ['uses' => 'CategoriaController@inserir']);
    $router->put('categoria/{id}', ['uses' => 'CategoriaController@alterar']);
    $router->delete('categoria/{id}', ['uses' => 'CategoriaController@deletar']);

    $router->get('pessoas', ['uses' => 'PessoaController@listar']);
    $router->get('pessoa/{id}', ['uses' => 'PessoaController@buscar']);
    $router->post('pessoa', ['uses' => 'PessoaController@criar']);
    $router->put('pessoa/{id}', ['uses' => 'PessoaController@alterar']);
    $router->delete('pessoa/{id}', ['uses' => 'PessoaController@deletar']);

    $router->get('lancamentos', ['uses' => 'LancamentoController@listar']);
    $router->get('lancamento/{id}', ['uses' => 'LancamentoController@buscar']);
    $router->post('lancamentos', ['uses' => 'LancamentoController@criar']);
    $router->put('lancamento/{id}', ['uses' => 'LancamentoController@atualizar']);
    $router->delete('lancamento/{id}', ['uses' => 'LancamentoController@deletar']);
});

