<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\cadastroController;


Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'store']);

Route::get('/cadastro', [cadastroController::class, 'index']);
Route::post('/cadastro', [cadastroController::class, 'store']);
