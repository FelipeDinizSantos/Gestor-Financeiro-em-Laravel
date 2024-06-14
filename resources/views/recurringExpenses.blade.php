<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos Recorrentes</title>
</head>
<body>
    <h1>Gastos recorrentes do Usuário: {{ $user->name }}</h1>
    <ul>
        @foreach ($recurringExpenses as $recurringExpense)
            <li>{{ $recurringExpense->description }}</li>
            <form action="{{ route('recurring-expenses.destroy', $recurringExpense->id) }}" method="POST">
            @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        @endforeach
    </ul>
    <a href="{{ route('gastos-recorrentes.create') }}">Crie um novo <strong>gasto recorrente</strong></a>
</body>
</html>