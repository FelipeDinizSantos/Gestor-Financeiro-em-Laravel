<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Account;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]); 

        auth()->login($user);

        $account = Account::create([
            'user_id' => $user->id,
            'amount' => 0,
        ]);

        $categories = Category::all();

        return view('dashboard', [
            'user' => $user, 
            'account' => $account,
            'categories' => $categories,
        ]);
    }
}
