<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #ff6347;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ff6347;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #ff6347;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        button:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Cadastrar Produto</h2>
    <form method="POST" action="ConfirmaProduto.php">
        <input type="text" name="nome" placeholder="Digite o nome do produto" required>
        <input type="text" name="marca" placeholder="Digite a marca do produto" required>
        <input type="number" step="0.01" name="preco" placeholder="Digite o preço do produto" required>
        <input type="number" name="quantidade" placeholder="Digite a quantidade do produto" required>
        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
