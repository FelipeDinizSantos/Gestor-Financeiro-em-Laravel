<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/recurringTransaction.js" defer></script>
        <link rel="stylesheet" href="/css/recurringTransactions.css">
    <title>{{ $user->name }} - Transações Recorrentes</title>
</head>
<body>
    <span class="overlay"></span>
    <main>
        <h1 class="page-title">
            <img src="/img/recurrenceIcon.png" />
            Transações recorrentes da Conta:
        </h1>
        <ul>
            @foreach ($recurringTransactions as $recurringTransaction)
                <li>
                    Nome: {{ $recurringTransaction->description }} 
                    <br/>
                    Tipo: 
                    @if ($recurringTransaction->type == 'expense')
                        Saída
                    @elseif ($recurringTransaction->type == 'earning')
                        Entrada
                    @endif 
                    <br />
                 
                    @if($recurringTransaction->category)
                        Categoria: {{ $recurringTransaction->category->description }}
                        <br />
                    @endif
                   
                    {{ $recurringTransaction->start_date }} - {{ $recurringTransaction->end_date }}
                </li>
                <form action="{{ route('recurring-transactions.destroy', $recurringTransaction->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Excluir</button>
                    </form>
            @endforeach
        </ul>
        <a href="#" class="create-recurrence">
            <img src="/img/plusIcon.png" />
            Criar nova
        </a>
        <a href="{{ route('dashboard.index') }}" class="back">Voltar</a>
    </main>
    
    <div class="create-recurrencig-container">
        <form action="{{ route('recurring-transactions.store') }}" method="post" class="create-recurring-transaction">
            @csrf
            <h1>Crie uma Transação Recorrente:</h1>

            <label for="description">Nome:</label>
            <input type="text" name="description" />

            <label for="type">Tipo:</label>
            <select name="type">
                <option value="earning">Ganho</option>
                <option value="expense">Gasto</option>
            </select>            

            <label for="category">Categorias:</label>
            <select name="category">
                <option value=""></option>
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

            <label for="end-date">Data de Término:</label>
            <input type="date" name="end-date" />

            <button type="submit">Salvar</button>
        </form>
        <p class="close-btn">x</p>
    </div>
</body>
</html>