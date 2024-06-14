<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Transações Recorrentes</title>
</head>
<body>
    <h1>Transações recorrentes da Conta:</h1>
    <ul>
        @foreach ($recurringTransactions as $recurringTransaction)
            <li>{{ $recurringTransaction->description }}</li>
            <form action="{{ route('recurring-transactions.destroy', $recurringTransaction->id) }}" method="POST">
            @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        @endforeach
    </ul>
    <a href="{{ route('transacoes-recorrentes.create') }}">Criar nova <strong>transação recorrente</strong></a>
</body>
</html>