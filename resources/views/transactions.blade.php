<!DOCTYPE html>
<html>
<head>
    <title>Transações</title>
</head>
<body>
    <h1>Transações</h1>
    <a href="/transactions/create">Adicionar Transação</a>
    <ul>
        <?php foreach ($transactions as $transaction): ?>
            <li>
                <?php echo htmlspecialchars($transaction['description']); ?> - 
                <?php echo htmlspecialchars($transaction['amount']); ?> - 
                <?php echo htmlspecialchars($transaction['category_name']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
