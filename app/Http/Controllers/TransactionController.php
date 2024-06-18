<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\TransactionHistory;

class TransactionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $categories = Category::all();

        return view('createTransaction', ['categories' => $categories]);
    }

    public function store(StoreTransactionRequest $request)
    {
        $validated = $request->validated();
        $user = Auth::user();

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'category_id' => $validated['category'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
        ]);

        $account = Account::where('user_id', $user->id)->first();

        if ($transaction->type == 'expense') {
            $account->amount -= $transaction->amount;
        } else {
            $account->amount += $transaction->amount;
        }
        $account->save();

        TransactionHistory::create([
            'account_id' => $account->id,
            'category_id' => $transaction->category_id,
            'type' => $transaction->type,
            'description' => $transaction->description,
            'amount' => $transaction->amount,
        ]);     
        
        return redirect()->back();
    }
}
