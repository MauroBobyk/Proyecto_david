<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargaDeLibrosController;


Route::get('/', function () {
    return view('/index');
});
Route::resource('libros',CargaDeLibrosController::class);