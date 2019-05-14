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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::prefix('onibus')->name('onibus_')->group(function () {
        Route::resource('urbano', 'OnibusUrbanoController');
        Route::resource('intermunicipal', 'OnibusIntermunicipalController');
        Route::resource('inativo', 'OnibusInativoController');
    });

    Route::prefix('trajeto')->name('trajeto_')->group(function () {
        Route::resource('urbano', 'TrajetoUrbanoController');
        Route::resource('intermunicipal', 'TrajetoIntermunicipalController');
        Route::get('intermunicipal/create/prepare', 'TrajetoIntermunicipalController@prepareCreate')->name('intermunicipal.create.prepare');
        Route::get('intermunicipal/create/{qntTrechos}', 'TrajetoIntermunicipalController@create');
        Route::resource('trecho', 'TrechoController');
    });

    Route::prefix('tarifa')->name('tarifa_')->group(function () {
        Route::resource('urbano', 'TarifaUrbanoController');
        Route::resource('intermunicipal', 'TarifaIntermunicipalController');
    });

    Route::prefix('categoria')->name('categoria_')->group(function () {
        Route::resource('passageiro', 'CategoriaPassageiroController');
    });

    Route::resource('funcionario', 'FuncionarioController');

    Route::resource('pagamento', 'FormaDePagamentoController');

    Route::prefix('alocacao')->name('alocacao_')->group(function () {
        Route::resource('urbano', 'AlocacaoUrbanoController');
        Route::resource('intermunicipal', 'AlocacaoIntermunicipalController');
    });

    Route::resource('seguro', 'SeguroController');

});



    
    Route::prefix('compra')->name('compra_')->group(function () {
        Route::resource('intermunicipal', 'CompraPassagensIntermunicipalController');
    
    });    
        

    Route::prefix('rodoviarias')->name('rodoviarias_')->group(function () {
        Route::resource('ativas', 'RodoviariasController');
        Route::resource('inativas', 'RodoviariasInativasController');
    });

    Route::prefix('venda')->name('venda_')->group(function() {

        Route::group(['prefix' => 'intermunicipal', 'as' => 'intermunicipal'], function () {
            Route::get('', 'VendaPassagemIntermunicipalController@index')->name('.index');
            Route::get('{origem}/{destino}/{data}', 'VendaPassagemIntermunicipalController@list')->name('.list');
            Route::post('search', 'VendaPassagemIntermunicipalController@search')->name('.search');
        });

        
    });

});
