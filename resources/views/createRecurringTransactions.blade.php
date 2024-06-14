<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Transação Recorrente</title>
    <link rel="stylesheet" href="/css/createRecurringExpense.css">
</head>
<body>
    <form action="{{ route('recurring-transactions.store') }}" method="post" class="create-recurring-transaction">
        @csrf
        <label for="description">Nome:</label>
        <input type="text" name="description" />

        <label for="type">Tipo:</label>
        <select name="type">
            <option value="earning">Entrada</option>
            <option value="expense">Saída</option>
        </select>            

        <label for="category">Categorias:</label>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->description }}</option>
            @endforeach
        </select>

        <label for="amount">Valor:</label>
        <input type="number" name="amount" min="1" max="99999999.99" />

        <label for="recurrence">Recorrência:</label>
        <select name="recurrence">
            <option value="daily">Diariamente</option>
            <option value="weekly" selected>Semanalmente</option>
            <option value="monthly">Mensalmente</option>
            <option value="yearly">Anualmente</option>
        </select>

        <label for="start-date">Data de Inicio:</label>
        <input type="date" name="start-date" />

        <label for="end-date">Data de Inicio:</label>
        <input type="date" name="end-date" />

        <button type="submit">Salvar</button>
    </form>
</body>
</html>