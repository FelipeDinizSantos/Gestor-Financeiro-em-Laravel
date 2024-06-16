<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }
        
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        
        return view('dashboard', ['user' => $user, 'account' => $account]);
    }
}
