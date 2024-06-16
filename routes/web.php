<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecurringExpensesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecurringTransactionController;
use App\Http\Controllers\AccountController;

Route::get('/', [AuthController::class, 'authForm'])->name('login.authForm');
Route::post('/login', [AuthController::class, 'authUser'])->name('login.authUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('login.logout');

Route::get('/transacoes-recorrentes/criar', [RecurringTransactionController::class, 'create'])->name('transacoes-recorrentes.create');
Route::get('/transacoes-recorrentes', [RecurringTransactionController::class, 'index'])->name('transacoes-recorrentes.index');
Route::post('/recurring-transactions', [RecurringTransactionController::class, 'store'])->name('recurring-transactions.store');
Route::delete('/recurring-transactions/{id}', [RecurringTransactionController::class, 'destroy'])->name('recurring-transactions.destroy');

Route::get('/dashboard', [AccountController::class, 'index'])->name('dashboard.index');