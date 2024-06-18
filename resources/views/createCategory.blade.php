<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/createCategory.css">
    <title>Criar Categoria</title>
</head>
<body>
    <form action="{{route('categories.store')}}" method="post">
        @csrf

        <label for="description">Nome:</label>
        <input type="text" name="description" />
        <label for="type">Tipo:</label>
        <select name="type">
            <option value="expense">Saída</option>
            <option value="earning">Entrada</option>
        </select>
        <button type="submit">Criar</button>
    </form>

    <a href="{{route('categorias.index')}}"> Voltar </a>
</body>
</html>