<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redireciona para o dashboard
            return redirect()->intended('/dashboard');
        }

        // Falha na autenticação, redireciona de volta com erro
        return back()->withErrors([
            'email' => 'Credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }
}
