<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/createCategory.css">
    <title>Criar Categoria</title>
</head>
<body>
    <main>
    <h1 class="page-title">
        <img src="/img/categoriesIcon">
        Criar Categoria
        </h1>
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        
        <label for="description">Nome:</label>
        <input type="text" name="description" />
        <br><br>
        <label for="type">Tipo:</label>
        <select name="type">
            <option value="expense">Saída</option>
            <option value="earning">Entrada</option>
        </select>
        <br><br>
        <div class="create-button">
            <button input#type=submit>Criar Categoria</button>
        </div>
        
    </form>
    
    <a href="{{route('categorias.index')}}"> Voltar </a>
    </main>
</body>
</html>