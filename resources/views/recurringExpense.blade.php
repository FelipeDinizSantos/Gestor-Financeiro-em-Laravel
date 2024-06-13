<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Gasto Recorrente</title>
</head>
<body>
    <form action="{{ route('recurringExpenses.store') }}" method="post">
        @csrf
        <label for="description">Nome:</label>
        <input type="text" name="description" />

        <label for="amount">Valor:</label>
        <input type="number" name="amount" min="1" max="99999999.99" />

        <label for="recurrence">Recorrência</label>
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