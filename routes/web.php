<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecurringExpensesController;
use App\Http\Controllers\LoginController;

// <start> Rotas de autenticação

    Route::get('/', function () {
        return view('login');
    });

// Rota para exibir a página de login
Route::get('/login', [LoginController::class, 'formLogin'])->name('login');

// Rota para processar o login
Route::post('/login', [LoginController::class, 'login']);

// <end> Rotas de autenticação


// <start> Cadastro de gastos recorrentes

Route::get('/gastos-recorrentes/criar', [RecurringExpensesController::class, 'create'])->name('gastos-recorrentes.create');
Route::get('/gastos-recorrentes', [RecurringExpensesController::class, 'index'])->name('gastos-recorrentes.index');
Route::post('/recurringExpenses', [RecurringExpensesController::class, 'store'])->name('recurringExpenses.store');
Route::delete('/recurring-expenses/{id}', [RecurringExpensesController::class, 'destroy'])->name('recurring-expenses.destroy');

// <end> Cadastro de gastos reccorentes'