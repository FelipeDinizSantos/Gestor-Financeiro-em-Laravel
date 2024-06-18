<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/register.css">
    <title>Cadastro</title>
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
        <form method="POST" action="{{ route('register.store') }}" class="formRegister">
            @csrf
            <h1>Crie sua Conta</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" autofocus="true" required />
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" placeholder="Digite seu e-mail" autofocus="true" required />
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required />
            <label for="password_confirmation">Confirme sua senha:</label>
            <input type="password" id="password" name="password_confirmation" placeholder="Digite sua senha" required />
            <input type="submit" value="Criar" class="btn" />
        </form>
    </div>
</body>
</html>