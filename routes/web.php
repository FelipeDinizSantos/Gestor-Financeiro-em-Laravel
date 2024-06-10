<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// <start> Cadastro de gastos recorrentes

Route::post('/', function(){
    dd('Hello, World!');
});

// <end> Cadastro de gastos reccorentes