<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/category.css">
    <title>Categorias</title>
</head>
<body>
    <h1>Categorias</h1>
    <a href="{{ route('categorias.create') }}">Adicionar Categoria</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                Nome: {{$category->description}} <br />
                Tipo: 
                @if($category->type == 'expense')
                    Despesa
                @else
                    Entrada
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>