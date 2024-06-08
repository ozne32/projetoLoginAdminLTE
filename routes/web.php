<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function(){
    return view('login');
});
Route::get('/sign-in', function(){
    return view('sign_in');
});
Route::post('/home/criar', [UserController::class, 'criar']);
Route::post('/home/verificar', [UserController::class, 'verificar']);