<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\masterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\cadastroUsuarioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\contatosController;
use App\Http\Controllers\editController;
use App\Http\Controllers\editUserController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\imoveisController;
use App\Http\Controllers\clienteController;

Route::get('/', [masterController::class, 'index']);
Route::post('/', [masterController::class, 'store']);

Route::post('/enviarEnviar', [emailController::class, 'store']);
Route::post('/logout', [logoutController::class, 'index']);
Route::post('/admin/logout', [logoutController::class, 'index']);
Route::post('/limparFiltro', [logoutController::class, 'filtro']);
Route::post('/limparFiltroIndidual', [logoutController::class, 'limpaFiltro']);

Route::get('/sobre', [masterController::class, 'sobre']);

Route::get('/contato', [masterController::class, 'contato']);
Route::post('/contato', [masterController::class, 'envioContato']);

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'auth']);

Route::get('/cadastro', [cadastroUsuarioController::class, 'index']); //cadastro de user
Route::post('/cadastro', [cadastroUsuarioController::class, 'store']); //cadastro de user

Route::get('/imoveis', [imoveisController::class, 'index']);
Route::post('/imoveis', [imoveisController::class, 'search']);
Route::post('/maisItens', [imoveisController::class, 'maisItens']);

Route::post('/imoveis/{id}', [imoveisController::class, 'detalhe']);

Route::get('/admin', [adminController::class, 'index']);
Route::post('/admin', [adminController::class, 'search']);
Route::get('/admin/cadastrar', [adminController::class, 'item']); //cadastro de produto
Route::post('/admin/cadastrar', [adminController::class, 'store']); //cadastro de produto

Route::get('/admin/editUsuario', [editUserController::class, 'user']);
Route::post('/admin/editUsuario', [editUserController::class, 'editUser']);

Route::post('/admin/edit/{id}', [editController::class, 'processaDados']);

Route::get('/admin/contatos', [contatosController::class, 'index']);
Route::post('/admin/contatos', [contatosController::class, 'store']);
Route::post('/admin/contatos/delete', [contatosController::class, 'destroy']);

Route::get('/admin/clientes', [clienteController::class, 'index']);
Route::post('/admin/clientes', [clienteController::class, 'store']);

Route::post('/edit/imgPrincipal/{id}', [editController::class, 'alterarImgPrincipal']);
Route::post('/salvar/{id}', [editController::class, 'update']);
Route::delete('/deletar/{id}', [editController::class, 'destroy']);
Route::delete('/deletar/img/{id}', [editController::class, 'destroyImg']);


Route::get('/info/politica-de-privacidade', [masterController::class, 'polpriv']);
Route::get('/info/termos-de-servico', [masterController::class, 'termservice']);
