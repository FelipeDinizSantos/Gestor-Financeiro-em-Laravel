<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\User;
use App\Models\Category;
use App\Models\Reminder;

class AccountController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }
        
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        $categories = Category::all();
        $reminders = Reminder::all(); 

        return view('dashboard', [
            'user' => $user, 
            'account' => $account,
            'categories' => $categories,
            'reminders' => $reminders,
        ]);
    }

    public function update(UpdateAccountRequest $request, $id){
        $validated = $request->validated();
        
        $account = Account::findOrFail($id);
        $newAmount = $account->amount + $validated['amount'];  

        $account->update([
            'amount' => $newAmount,
        ]);

        return redirect()->route('dashboard.index');
    }
}
