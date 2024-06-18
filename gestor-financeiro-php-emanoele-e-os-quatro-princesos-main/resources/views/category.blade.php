<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/category.css">
    <title>Categorias</title>
</head>
<body>
    <main>
        <h1 class="page-title">
        <img src="/img/categoriesIcon">
        Categorias
        </h1>
        <ul></ul>

        <a href="http://127.0.0.1:8000/categorias/criar" class="create-new-categories">
            <img src="/img/plusIcon.png" />
            Criar Categoria
        </a>


        <a href="{{ route('categorias.create') }}"></a>
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
    </main>
</body>
</html>