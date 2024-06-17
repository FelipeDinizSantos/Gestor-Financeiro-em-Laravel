<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecurringTransactionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;

Route::get('/cadastro', [UserController::class, 'create'])->name('register.create'); // Register Form
Route::post('/register', [UserController::class, 'store'])->name('register.store');  // Create an User Resource

Route::get('/', [AuthController::class, 'authForm'])->name('login.authForm');
Route::post('/login', [AuthController::class, 'authUser'])->name('login.authUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('login.logout');

Route::get('/dashboard', [AccountController::class, 'index'])->name('dashboard.index');

Route::patch('/account/{id}', [AccountController::class, 'update'])->name('account.update');

Route::get('/transacoes-recorrentes', [RecurringTransactionController::class, 'index'])->name('transacoes-recorrentes.index');
Route::post('/recurring-transactions', [RecurringTransactionController::class, 'store'])->name('recurring-transactions.store');
Route::delete('/recurring-transactions/{id}', [RecurringTransactionController::class, 'destroy'])->name('recurring-transactions.destroy');
