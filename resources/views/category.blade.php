<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <h1>Categorias</h1>
    <a href="/category/create">Adicionar Categoria</a>
    <ul>
        @foreach ($categories as $category)
            <li>$categories['category']</li>
        @endforeach
    </ul>
</body>
</html>