<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\RecurringTransaction;
use App\Models\User;
use App\Models\TransactionHistory;
use Carbon\Carbon;

class budgetOverviewController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        $account = Account::where('user_id', $user->id)->first();
        $transactionHistories = TransactionHistory::all();

        $currentDate = Carbon::now();
    
        $recurringTransactions = RecurringTransaction::where(function($query) use ($currentDate) {
            $query->where('start_date', '<=', $currentDate)
                ->where('end_date', '>=', $currentDate)
                ->orWhereNull('end_date');
        })->get();

        $account = Account::where('user_id', $user->id)->first();

        $currentAmount = $account->amount;
        $projectedAmount = $currentAmount;

        foreach ($recurringTransactions as $transaction) {
            $recurrence = $transaction->recurrence;
            $amount = $transaction->type == 'earning' ? $transaction->amount : -$transaction->amount;
            $start_date = Carbon::parse($transaction->start_date);
            $end_date = Carbon::parse($transaction->end_date);

            $occurrences = 0;
            switch ($recurrence) {
                case 'daily':
                    $occurrences = $currentDate->diffInDays($end_date);
                    break;
                case 'weekly':
                    $occurrences = $currentDate->diffInWeeks($end_date);
                    break;
                case 'monthly':
                    $occurrences = $currentDate->diffInMonths($end_date);
                    break;
                case 'yearly':
                    $occurrences = $currentDate->diffInYears($end_date);
                    break;
            }

            $projectedAmount += $amount * $occurrences;
        }

        return view ('budgetOverview', [
            'user' => $user,
            'account' => $account,
            'transactionHistories' => $transactionHistories,
            'projectedAmount' => $projectedAmount,
        ]);
    }
}
