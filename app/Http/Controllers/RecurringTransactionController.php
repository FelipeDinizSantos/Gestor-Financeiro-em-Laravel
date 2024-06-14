<?php

namespace App\Http\Controllers;

use App\Models\RecurringTransaction;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\StoreRecurringTransactionRequest;
use App\Http\Requests\UpdateRecurringTransactionRequest;

class RecurringTransactionController extends Controller
{
    public function index()
    {
        // use Illuminate\Support\Facades\Auth;
        // $user = Auth::user();

        $recurringTransactions = RecurringTransaction::where('user_id', 1)->get();
        $user = User::where('id', 1)->first(); // $user->id;

        return view('recurringTransactions', [
            'recurringTransactions' => $recurringTransactions,
            'user' => $user,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('createRecurringTransactions')->with('categories', $categories);
    }

    public function store(StoreRecurringTransactionRequest $request)
    {
        $validated = $request->validated();

        // $user = Auth::user();

        RecurringTransaction::create([
            'user_id' => 1, // $user->id;
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
