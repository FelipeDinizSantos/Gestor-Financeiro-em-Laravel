<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização das Finanças</title>
    <link rel="stylesheet" href=" {{ asset('css/budgetOverview.css') }} ">
</head>
<body>
    <header>
        <h1>Visualização das Finanças</h1>
        <button onclick="window.history.back();">Voltar</button>
    </header>
    <section class="balance-section">
        <div class="balance">
            <h2>Saldo em Conta</h2>
            <p>R$ 5,000.00</p>
        </div>
        <div class="categories">
            <h2>Categorias</h2>
            <label for="category">Escolha uma Categoria:</label>
            <select id="category" name="category">
                <option value="receitas">Receitas</option>
                <option value="gastos">Gastos</option>
            </select>
        </div>
    </section>
    <section class="finance-overview">
        <h2>Projeção das Finanças</h2>
        <label for="month">Mês:</label>
        <input type="month" id="month" name="month">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01/06/2024</td>
                    <td>Salário</td>
                    <td>Receitas</td>
                    <td>R$ 3,000.00</td>
                </tr>
                <tr>
                    <td>05/06/2024</td>
                    <td>Aluguel</td>
                    <td>Gastos</td>
                    <td>R$ 1,500.00</td>
                </tr>
                <tr>
                    <td>10/06/2024</td>
                    <td>Supermercado</td>
                    <td>Gastos</td>
                    <td>R$ 500.00</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>