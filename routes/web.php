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
    return redirect('autenticar');
});

Route::get('autenticar', function () {
    return view('login');
});

Route::post('autenticacao', 'FuncionarioController@login');

Route::group(['middleware' => ['sme']], function () {
    
    Route::get('dashboard', 'AlunoController@viewCountVaga');
    
    Route::get('vaga', 'AlunoController@viewVaga');
    
    Route::post('vaga', 'AlunoController@selectAluno');
    
    Route::get('cadastro', 'AlunoController@viewVagaCadastro');
    
    Route::post('cadastrar', 'AlunoController@cadastrarAluno');
    
    Route::get('atualizar/{id_aluno}', 'AlunoController@atualizarStatusVaga');
    
    Route::get('visualizar/{id_aluno}', 'AlunoController@viewAluno');
    
    Route::get('calculo-fase-escolar/{dt_nascimento_aluno}', 'AlunoController@calcularFaseEscolar');

     Route::get('logout', 'FuncionarioController@logout');

});