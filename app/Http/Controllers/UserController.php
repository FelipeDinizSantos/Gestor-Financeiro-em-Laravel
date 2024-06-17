<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Account;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        // Lógica para criação de um User e uma Account para este mesmo usuário
        // ...
    }
}
