<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecurringExpensesController;
use App\Http\Controllers\LoginController;

// <start> Rotas de autenticação

    Route::get('/', function () {
        return view('login');
    });

Route::get('/login', [LoginController::class, 'formLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// <end> Rotas de autenticação

use App\Http\Controllers\RecurringTransactionController;
use App\Http\Controllers\AccountController;



Route::get('/transacoes-recorrentes/criar', [RecurringTransactionController::class, 'create'])->name('transacoes-recorrentes.create');
Route::get('/transacoes-recorrentes', [RecurringTransactionController::class, 'index'])->name('transacoes-recorrentes.index');
Route::post('/recurring-transactions', [RecurringTransactionController::class, 'store'])->name('recurring-transactions.store');
Route::delete('/recurring-transactions/{id}', [RecurringTransactionController::class, 'destroy'])->name('recurring-transactions.destroy');

Route::get('/dashboard', [AccountController::class, 'index']);