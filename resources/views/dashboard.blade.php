<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <script src="/js/dashboard.js" defer></script>
</head>
<body>
    <span class="overlay"></span>
    <main>
        <article class="account-informations">
            <h1 class="compliments">Olá, {{ $user->name }}</h1>
            <p class="account-amount"> 
                Conta 
                <br/> R$ {{ $account->amount }} 
                <img src="/img/updateBalanceIcon.png" class="update-account-balance" /> 
            </p>
        </article>
        
        <article class="functionalities-menu">
            <h1>Explore:</h1>
            <div class="recurring-transactions">
                <a href="{{ route('transacoes-recorrentes.index') }}">
                    <img src="/img/recurrenceIcon.png" />
                    <p>Recorrentes</p>
                </a>
            </div>
        </article>

    <form action="{{ route('login.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Sair</button>
    </form>
    </main>

    <div class="update-balance-container">
        <h1>Atualize seu saldo:</h1>
        <form action="{{ route('account.update', $account->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="number" name="amount" min="1" />
            <button type="submit"> Atualizar </button>
        </form>
        <p class="close-btn">x</p>
    </div>
</body>
</html>