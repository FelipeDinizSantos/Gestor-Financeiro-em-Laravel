<?php

namespace App\Http\Controllers;

use App\Models\RecurringExpense;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\StoreRecurringExpenseRequest;
use App\Http\Requests\UpdateRecurringExpenseRequest;

class RecurringExpensesController extends Controller
{
    public function index()
    {
        // use Illuminate\Support\Facades\Auth;
        // $user = Auth::user();

        $recurringExpenses = RecurringExpense::where('user_id', 1)->get();
        $user = User::where('id', 1)->first(); // $user->id;

        return view('recurringExpenses', [
            'recurringExpenses' => $recurringExpenses,
            'user' => $user,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('createRecurringExpense')->with('categories', $categories);
    }

    public function store(StoreRecurringExpenseRequest $request)
    {
        $validated = $request->validated();

        // $user = Auth::user();

        RecurringExpense::create([
            'user_id' => 1, // $user->id;
            'type' => $validated['type'],
            'category_id' => $validated['category'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'recurrence' => $validated['recurrence'],
            'start_date' => $validated['start-date'],
            'end_date' => $validated['end-date'],
        ]);

        return redirect()->route('gastos-recorrentes.index');
    }

    public function destroy($id)
    {
        $recurringExpense = RecurringExpense::findOrFail($id);
        $recurringExpense->delete();

        return redirect()->route('gastos-recorrentes.index');
    }
}
