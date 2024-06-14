<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Dashboard</title>
</head>
<body>
    <main>
        <article class="account-informations">
            <h1 class="compliments">Olá, {{ $user->name }}</h1>
            <p class="account-amount"> Conta <br/> R$ {{ $account->amount }} </p>
        </article>
        
        <article class="functionalities-menu">
            <div class="recurring-transactions">
                <a href="{{ route('transacoes-recorrentes.index') }}">Transações Recorrentes</a>
            </div>
        </article>
    </main>
</body>
</html>