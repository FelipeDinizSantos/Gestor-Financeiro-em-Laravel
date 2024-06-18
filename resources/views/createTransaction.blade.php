<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Transação</title>
</head>
<body>
    <h1>Adicionar Transação</h1>
    <form action="/transactions/create" method="POST">
        <label for="amount">Valor:</label>
        <input type="text" id="amount" name="amount" required>
        
        <label for="description">Descrição:</label>
        <input type="text" id="description" name="description" required>
        
        <label for="category_id">Categoria:</label>
        <select id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
