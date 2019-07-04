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
// Route::group(['prefix' => 'perfilcliente', 'as' => 'perfilcliente'], function () {
//     Route::get('', 'ClienteController@index')->name('.index');

// });
Route::resource('perfilcliente', 'ClienteController');

Route::group(['prefix' => '/', 'as' => 'page_'], function () {
    Route::get(null, 'HomeController@index')->name('home.index');
    Route::get('painel', 'PainelController@index')->name('painel.index');

    Route::group(['prefix' => 'compra', 'as' => 'compra'], function () {
        Route::get('', 'CompraPassagemController@index')->name('.index');
        Route::post('search', 'CompraPassagemController@search')->name('.search');
        Route::get('{origem}/{destino}/{data_ida}/', 'CompraPassagemController@list')->name('.list');
        Route::get('{origem}/{destino}/{data_ida}/{data_volta}', 'CompraPassagemController@list')->name('.list');
        Route::get('poltrona', 'CompraPassagemController@selecionarPoltrona')->name('.poltrona');
        Route::post('poltrona', 'CompraPassagemController@selecionarPoltrona')->name('.poltrona');

        Route::group(['middleware' => ['client_authenticate']], function () {
            Route::get('pagamento', 'PagamentoController@pagamento')->name('.pagamento');
            Route::post('pagamento', 'PagamentoController@pagamento')->name('.pagamento');
            Route::post('registro', 'PagamentoController@store')->name('.store');
        });
    });

        Route::group(['prefix' => 'cadastro', 'as' => 'cadastro'], function () {
        Route::get('', 'CadastroClienteController@index')->name('.index');
        Route::post('', 'CadastroClienteController@store')->name('.store');
    });

    Route::group(['prefix' => 'entrar', 'as' => 'entrar'], function () {
        Route::get('', 'ClienteLoginController@index')->name('.index');
    });

});

Auth::routes();
Route::group(['prefix' => 'painel'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/compra', 'CompraPassagemController@index')->name('compra_passagem');

    Route::group(['middleware' => ['auth', 'is_admin']], function () {
        Route::resource('user', 'UserController', ['except' => ['show']]);
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
        Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

        Route::prefix('vendapassagem')->name('vendapassagem')->group(function () {
            Route::get('', 'VendaPassagemController@index')->name('.index');
            Route::post('search', 'VendaPassagemController@search')->name('.search');
            Route::get('{origem}/{destino}/{data_ida}/', 'VendaPassagemController@list')->name('.list');
            Route::get('{origem}/{destino}/{data_ida}/{data_volta}', 'VendaPassagemController@list')->name('.list');
            Route::post('poltrona', 'VendaPassagemController@selecionarPoltrona')->name('.poltrona');
            Route::post('pagamento', 'VendaPassagemController@pagamento')->name('.pagamento');
            Route::post('registro', 'VendaPassagemController@store')->name('.store');
        });
    
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
            Route::resource('encomenda', 'TarifaEncomendaController');
        });

        Route::prefix('categoria')->name('categoria_')->group(function () {
            Route::resource('passageiro', 'CategoriaPassageiroController');
        });

        Route::resource('funcionario', 'FuncionarioController');

        Route::resource('manutencoes', 'RegistroManutencaoController');

        Route::resource('pagamento', 'FormaDePagamentoController');

        Route::prefix('alocacao')->name('alocacao_')->group(function () {
            Route::resource('urbano', 'AlocacaoUrbanoController');
            Route::resource('intermunicipal', 'AlocacaoIntermunicipalController');
        });

        Route::resource('seguro', 'SeguroController');

        Route::resource('segurofuncionario', 'SeguroFuncionarioController');

        Route::prefix('rodoviarias')->name('rodoviarias_')->group(function () {
            Route::resource('ativas', 'RodoviariasController');
            Route::resource('inativas', 'RodoviariasInativasController');
        });

        Route::resource('sinistro', 'RegistroSinistroController');

        Route::prefix('venda')->name('venda_')->group(function () {
            Route::group(['prefix' => 'intermunicipal', 'as' => 'intermunicipal'], function () {
                Route::get('', 'VendaPassagemIntermunicipalController@index')->name('.index');
                Route::get('{origem}/{destino}/{data}', 'VendaPassagemIntermunicipalController@list')->name('.list');
                Route::post('search', 'VendaPassagemIntermunicipalController@search')->name('.search');
            });

        });
    });
});
