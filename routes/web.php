<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/sign-in', function(){
    return view('sign_in');
});
Route::post('/home/criar', [UserController::class, 'criar']);
Route::post('/home/verificar', [UserController::class, 'verificar']);
Route::get('/home', function(){
    if(isset($_SESSION['status']) && $_SESSION['status']=='verificado'){
        return view('home');
    }else{
        return redirect('/')->with('status', 'naoAutorizado');
    }
});