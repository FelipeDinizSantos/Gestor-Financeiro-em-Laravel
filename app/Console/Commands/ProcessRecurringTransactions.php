<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\TransactionHistory;
use App\Models\RecurringTransaction;
use App\Models\Account;
use App\Models\BalanceHistory;

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

            if ($nextDate && $nextDate->isSameDay($today)) {
                $user = User::find($transaction->user_id);

                if ($user) {
                    $account = Account::where('user_id', $user->id)->first();

                    if ($account) {
                        BalanceHistory::create([
                            'account_id' => $account->id,
                            'amount' => $account->amount, 
                        ]);

                        if ($transaction->type == 'expense') {
                            $account->amount -= $transaction->amount;
                        } else {
                            $account->amount += $transaction->amount;
                        }
                        $account->save();

                        TransactionHistory::create([
                            'account_id' => $account->id,
                            'category_id' => $transaction->category_id,
                            'description' => $transaction->description,
                            'recurrence' => true,
                            'type' => $transaction->type,
                            'amount' => $transaction->amount,
                        ]);

                    } else {
                        $this->error("Conta não encontrada!");
                    }
                } else {
                    $this->error("Usuário não encontrado!");
                }
            }
        }
    }

    private function getNextDate($transaction, $today)
    {
        $startDate = Carbon::parse($transaction->start_date); 
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
            default:
                $this->error("Tipo de recorrência invalido!");
                return null;
        }
    }
}
