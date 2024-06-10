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
        <button type="submit">Criar</button>
    </form>
</body>
</html>