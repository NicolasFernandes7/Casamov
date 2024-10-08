<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Venda</title>
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
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Cadastrar Venda</h2>
    <form method="POST" action="ConfirmarVenda.php">
        <label for="valor_da_venda">Valor da Venda</label>
        <input type="number" step="0.01" name="valor_da_venda" id="valor_da_venda" placeholder="Digite o valor da venda" required>

        <label for="forma_de_pagamento">Forma de Pagamento</label>
        <input type="text" name="forma_de_pagamento" id="forma_de_pagamento" placeholder="Digite a forma de pagamento" required>

        <label for="data_da_venda">Data da Venda</label>
        <input type="date" name="data_da_venda" id="data_da_venda" required>

        <label for="CPFcliente">CPF do Comprador</label>
        <input type="text" name="CPFcliente" id="CPFcliente" placeholder="Digite o CPF do comprador" required>

        <label for="cpfVendedor">CPF do Vendedor</label>
        <input type="number" name="cpfVendedor" id="cpfVendedor" placeholder="Digite o CPF do vendedor" required>

        <label for="codigoProduto">Código do Produto</label>
        <input type="text" name="codigoProduto" id="codigoProduto" placeholder="Digite o código do produto vendido" required>

        <button type="submit">Cadastrar Venda</button>
    </form>
</div>

</body>
</html>
