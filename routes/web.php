<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecurringExpensesController;

// <start> Cadastro de gastos recorrentes

Route::get('/gastos-recorrentes/criar', function(){
    return view('recurringExpense');
});

Route::post('/recurringExpenses', [RecurringExpensesController::class, 'store'])->name('recurringExpenses.store');

//Route::get('/gastos-recorrentes', [::class, 'index']);

// <end> Cadastro de gastos reccorentes'