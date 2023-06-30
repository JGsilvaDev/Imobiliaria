<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\masterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\cadastroUsuarioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\editController;
use App\Http\Controllers\editUserController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\imoveisController;

Route::get('/', [masterController::class, 'index']);
Route::post('/', [masterController::class, 'store']);

Route::post('/enviarEnviar', [emailController::class, 'store']);
Route::post('/logout', [logoutController::class, 'index']);

Route::get('/sobre', [masterController::class, 'sobre']);
Route::get('/contato', [masterController::class, 'contato']);

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'auth']);

Route::get('/cadastro', [cadastroUsuarioController::class, 'index']);
Route::post('/cadastro', [cadastroUsuarioController::class, 'store']);

Route::get('/imoveis', [imoveisController::class, 'index']);
Route::post('/imoveis', [imoveisController::class, 'search']);

Route::post('/imoveis/{id}', [imoveisController::class, 'detalhe']);

Route::get('/admin', [adminController::class, 'index']);
Route::post('/admin', [adminController::class, 'search']);
Route::get('/admin/cadastrar', [adminController::class, 'item']);
Route::post('/admin/cadastrar', [adminController::class, 'store']);

Route::get('/admin/editUsuario', [editUserController::class, 'user']);
Route::post('/admin/editUsuario', [editUserController::class, 'editUser']);

Route::post('/admin/edit/{id}', [editController::class, 'processaDados']);

Route::post('/salvar/{id}', [editController::class, 'update']);
Route::delete('/deletar/{id}', [editController::class, 'destroy']);
Route::delete('/deletar/img/{id}', [editController::class, 'destroyImg']);
