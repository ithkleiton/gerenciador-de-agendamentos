<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentosController;

Route::get('/', function () {
    return view('home');
});

Route::resource('agendamentos', AgendamentosController::class);
