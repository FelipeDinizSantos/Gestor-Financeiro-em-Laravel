<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\User;
use App\Models\Category;

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

        return view('dashboard', [
            'user' => $user, 
            'account' => $account,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateAccountRequest $request, $id){
        $validated = $request->validated();
        
        $account = Account::findOrFail($id);
        $account->update([
            'amount' => $validated['amount'],
        ]);

        return redirect()->back();
    }
}
