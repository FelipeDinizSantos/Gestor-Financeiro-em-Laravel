<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$user->name}} - Visualização das Finanças</title>
    <script src="/js/budgetOverviewController.js" defer></script>
    <link rel="stylesheet" href=" {{ asset('css/budgetOverview.css') }} ">
</head>
<body>
    <header>
        <h1>Vizualizando Finanças de {{$user->name}}</h1>
        <button><a href="{{ route('dashboard.index') }}">Voltar</a></button>
    </header>
    <section class="balance-section">
        <div class="balance">
            <h2>Saldo Atual em Conta</h2>
            <p>R$ {{ round($account->amount, 2) }}</p>
        </div>
        <div class="categories">
            <h2>Filtros</h2>
            <form class="category-form">
                <label for="category">Buscar por:</label>
                <select id="category" name="category">
                    <option value="todas">Todas</option>
                    <option value="receitas">Receitas</option>
                    <option value="gastos">Gastos</option>
                </select>
                <button type="submit">Buscar</button>
            </form>
        </div>
    </section>
    <section class="finance-overview">
        <h2>Informações de Finanças:</h2>
        <p>Saldo da conta ao Final do Mês: <strong> R$ {{round($projectedAmount, 2)}}</strong></p>
        <form class="month-form">
            <label for="month">Mês:</label>
            <input type="month" id="month" name="month">
            <button type="submit">Carregar</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody class="finance-overview-body">
                @foreach ($transactionHistories as $transactionHistory)
                    <tr>
                        <td>{{date('d-m-Y', strtotime($transactionHistory->created_at))}}</td>
                        <td>{{ $transactionHistory->description }}</td>
                        <td>{{ $transactionHistory->type === 'earning'?'Receitas':'Gastos'}}</td>
                        <td>R$ {{ $transactionHistory->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>