<?php

namespace App\Http\Controllers;

use App\Models\RecurringTransaction;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\StoreRecurringTransactionRequest;
use App\Http\Requests\UpdateRecurringTransactionRequest;
use Illuminate\Support\Facades\Auth;

class RecurringTransactionController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        $user = Auth::user();

        $recurringTransactions = RecurringTransaction::where('user_id', $user->id)->get();

        return view('recurringTransactions', [
            'recurringTransactions' => $recurringTransactions,
            'user' => $user->name,
        ]);
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        $categories = Category::all();
        return view('createRecurringTransactions')->with('categories', $categories);
    }

    public function store(StoreRecurringTransactionRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        $validated = $request->validated();
        $userId = Auth::id();

        RecurringTransaction::create([
            'user_id' => $userId, 
            'type' => $validated['type'],
            'category_id' => $validated['category'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'recurrence' => $validated['recurrence'],
            'start_date' => $validated['start-date'],
            'end_date' => $validated['end-date'],
        ]);

        return redirect()->route('transacoes-recorrentes.index');
    }

    public function destroy($id)
    {
        $recurringTransaction = RecurringTransaction::findOrFail($id);
        $recurringTransaction->delete();

        return redirect()->route('transacoes-recorrentes.index');
    }
}
