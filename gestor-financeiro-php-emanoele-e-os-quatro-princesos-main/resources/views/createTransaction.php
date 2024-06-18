<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Transação</title>
</head>
<body>
    <form method="post" action="{{ route('transaction.store') }}">
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
            <option value="{{ $category->id }}"> {{ $category }} </option>
            @endforeach
        </select>

        <button type="submit"> Criar </button>
    </form>
</body>
</html>