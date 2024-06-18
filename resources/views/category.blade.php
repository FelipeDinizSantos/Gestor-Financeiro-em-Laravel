<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/category.css">
    <title>Categorias</title>
    <script defer src="/js/categories.js"></script>
</head>
<body>
    <span class="overlay"></span>
    <main>
        <h1 class="page-title">
        <img src="/img/categoriesIcon.png">
            Categorias
        </h1>

        <ul>
            @foreach ($categories as $category)
                <li>
                    <div class="category-information">
                        Categoria: {{$category->description}} 
                        |
                        Tipo: 
                        @if($category->type == 'expense')
                            Despesa
                        @else
                            Entrada
                        @endif 
                    </div>
                    <br />
                        @foreach ($transactions as $transaction)
                            @if ($category->id == $transaction->category_id)
                                @if($transaction->type == 'expense')
                                    Despesa
                                @else
                                    Entrada
                                @endif 
                                -
                                {{ $transaction->created_at }}
                                <br />
                                <div class="category-transactions">
                                    Descrição: {{ $transaction->description }} 
                                    <br />
                                    Valor: {{ $transaction->amount }} <br />
                                </div>
                            @endif
                        @endforeach
                        @foreach ($recurringTransactions as $recurringTransaction)
                            @if ($category->id == $recurringTransaction->category_id)
                                @if($recurringTransaction->type == 'expense')
                                    Despesa
                                @else
                                    Entrada
                                @endif 
                                -
                                {{ $recurringTransaction->created_at }}
                                <br />
                                <div class="category-transactions">
                                    Descrição: {{ $recurringTransaction->description }} 
                                    <br />
                                    Valor: {{ $recurringTransaction->amount }} 
                                    <br />
                                    Recorrente
                                </div>
                            @endif
                        @endforeach
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <a href="#" class="create-category">
            <img src="/img/plusIcon.png" />
            Criar Categoria
        </a>

        <a href="{{ route('dashboard.index') }}" class="back">Voltar</a>
    </main>

    <div class="create-category-container container">
        <h1> Criar Categoria</h1>
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
        <p class="close-btn">x</p>
    </div>
</body>
</html>