<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class ReminderController extends Controller
{
    public function store(StoreReminderRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        
        Reminder::create([
            'payday' =>  $validated['payday'],
            'amount' =>  $validated['amount'],
            'description' => $validated['description'],
            'account_id' => $account->id, 
        ]);

        return redirect()->route('dashboard.index');
    }

    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();

        return redirect()->route('dashboard.index');
    }
}
