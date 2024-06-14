<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecurringExpensesController;

// <start> Cadastro de gastos recorrentes

Route::get('/gastos-recorrentes/criar', [RecurringExpensesController::class, 'create'])->name('gastos-recorrentes.create');
Route::get('/gastos-recorrentes', [RecurringExpensesController::class, 'index'])->name('gastos-recorrentes.index');
Route::post('/recurringExpenses', [RecurringExpensesController::class, 'store'])->name('recurringExpenses.store');
Route::delete('/recurring-expenses/{id}', [RecurringExpensesController::class, 'destroy'])->name('recurring-expenses.destroy');

// <end> Cadastro de gastos reccorentes'