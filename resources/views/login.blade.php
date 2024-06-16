<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page">
        <form method="POST" action="{{ route('login.authUser') }}" class="formLogin">
            @csrf
            <h1>Faça seu Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" autofocus="true" required />
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required />
            <a href="/">Não tem uma conta?</a>
            <input type="submit" value="Acessar" class="btn" />
        </form>
    </div>
</body>
</html>
