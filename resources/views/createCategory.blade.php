<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Categoria</title>
</head>
<body>
    <h1>Adicionar Categoria</h1>
    <form action="/categories/create" method="POST">
        <label for="name">Nome da Categoria:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
