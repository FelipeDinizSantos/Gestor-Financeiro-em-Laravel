<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecurringTransactionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

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

Route::get('/categorias', [CategoryController::class, 'index'])->name('categorias.index');
Route::get('/categorias/criar', [CategoryController::class, 'create'])->name('categorias.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');