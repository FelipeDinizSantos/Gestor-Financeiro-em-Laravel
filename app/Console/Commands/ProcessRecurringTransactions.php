<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\TransactionHistory;
use App\Models\RecurringTransaction;
use App\Models\Account;

class ProcessRecurringTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:process-recurring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process recurring transactions and update user balances';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        
        $transactions = RecurringTransaction::where('start_date', '<=', $today)
            ->where(function ($query) use ($today) {
                $query->where('end_date', '>=', $today)
                      ->orWhereNull('end_date');
            })
            ->get();

        foreach ($transactions as $transaction) {
            $nextDate = $this->getNextDate($transaction, $today);

            if ($nextDate->isSameDay($today)) {
                $user = User::find($transaction->user_id);

                if ($user) {
                    $account = Account::where('user_id', $user->id)->first();

                    if ($account) {
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
                            'amount' => $transaction->amount,
                        ]);      
                                          
                    } else {
                        $this->error("Account not found for user ID: " . $user->id);
                    }
                } else {
                    $this->error("User not found for ID: " . $transaction->user_id);
                }
            }
        }
    }

    private function getNextDate($transaction, $today)
    {
        $startDate = $transaction->start_date;
        $recurrence = $transaction->recurrence;

        switch ($recurrence) {
            case 'daily':
                return $startDate->copy()->addDays($today->diffInDays($startDate));
            case 'weekly':
                return $startDate->copy()->addWeeks($today->diffInWeeks($startDate));
            case 'monthly':
                return $startDate->copy()->addMonths($today->diffInMonths($startDate));
            case 'yearly':
                return $startDate->copy()->addYears($today->diffInYears($startDate));
        }

        return null;
    }
}
