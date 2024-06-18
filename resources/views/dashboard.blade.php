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
            <h1 class="compliments">Olá, {{ $user->name }}!</h1>
            <p class="account-amount"> 
                Conta 
                <br/> R$ {{ $account->amount }} 
                <img src="/img/updateBalanceIcon.png" class="update-account-balance" /> 
            </p>
        </article>
        
        <article class="functionalities-menu">
            <h1>Explore:</h1>
            <div class="create-transactions explore-icon">
                <a href="#">
                    <img src="/img/transactionIcon.png" />
                    <p>Transações</p>
                </a>
            </div>
            <div class="recurring-transactions explore-icon">
                <a href="{{ route('transacoes-recorrentes.index') }}">
                    <img src="/img/recurrenceIcon.png" />
                    <p>Recorrentes</p>
                </a>
            </div>

            <div class="explore-icon">
                <a href="{{ route('categorias.index') }}">
                    <img src="/img/categoriesIcon.png">
                    <p>Categorias</p>
                </a>
            </div>
        </article>

    <form action="{{ route('login.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Sair</button>
    </form>
    </main>

    <div class="update-balance-container container">
        <h1>Atualize seu saldo:</h1>
        <p>O valor será acrescido a conta.<br />Valor atual: R$ {{ $account->amount }}</p>
        <form action="{{ route('account.update', $account->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="number" name="amount" min="1" />
            <button type="submit"> Atualizar </button>
        </form>
        <p class="close-btn">x</p>
    </div>

    <div class="create-transaction-container container">
        <h1>Crie uma transação:</h1>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf

            <label for="description">Descrição:</label>
            <input name="description" type="text" />
            <label for="amount">Valor:</label>
            <input type="number" name="amount" />
            <label for="type">Tipo:</label>
            <select name="type">
                <option value="expense">Saída</option>
                <option value="earning">Entrada</option>
            </select>
            <label for="category">Categoria:</label>
            <select name="category">
                <option value=""></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->description }} </option>
                @endforeach
            </select>
            <a href="{{ route('categorias.index') }}" class="create-category-link"><small>Criar uma categoria</small></a>

            <button type="submit"> Criar </button>
        </form>
        <p class="close-btn">x</p>
    </div>
</body>
</html>