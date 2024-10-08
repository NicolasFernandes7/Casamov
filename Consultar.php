<?php
require 'config.php';

echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes, Produtos e Vendedores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        h3 {
            color: #ff6347;
            margin-top: 40px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            border: 2px solid #ff6347;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(30% - 20px);
            min-width: 250px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #ff6347;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>';

$sql = "SELECT * FROM clientes;";
$resultado = $conexao->query($sql);

echo '<div class="container">';

if ($resultado->num_rows > 0) {
    echo "<h3>Clientes</h3><div class='card-container'>";
    while ($row = $resultado->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h4>Nome: " . $row['nome'] . "</h4>";
        echo "<p>CPF: " . $row['CPF'] . "</p>";
        echo "<p>Telefone: " . $row['telefone'] . "</p>";
        echo "<p>Endereço: " . $row['endereco'] . "</p>";
        echo "<p>Data de Nascimento: " . date("d/m/Y", strtotime($row['data_de_nascimento'])) . "</p>";
        echo "<a class='btn' href='alterarCliente.php?CPF=" . $row['CPF'] . "'>Alterar</a>";
        echo "<a class='btn' href='ExcluirCliente.php?CPF=" . $row['CPF'] . "'>Excluir</a>";
        echo "</div>";
    }
    echo "</div>";
}

$sql2 = "SELECT * FROM produtos;";
$resultado2 = $conexao->query($sql2);

if ($resultado2->num_rows > 0) {
    echo "<h3>Produtos</h3><div class='card-container'>";
    while ($row2 = $resultado2->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h4>Código: " . $row2['codigo'] . "</h4>";
        echo "<p>Nome: " . $row2['nome'] . "</p>";
        echo "<p>Marca: " . $row2['marca'] . "</p>";
        echo "<p>Preço: " . number_format($row2['valor'], 2, ',', '.') . "</p>";
        echo "<p>Quantidade: " . $row2['quantidade'] . "</p>";
        echo "<a class='btn' href='alterarProduto.php?codigo=" . $row2['codigo'] . "'>Alterar</a>";
        echo "<a class='btn' href='ExcluirProduto.php?codigo=" . $row2['codigo'] . "'>Excluir</a>";
        echo "</div>";
    }
    echo "</div>";
}

$sql = "SELECT * FROM vendedor;";
$resultado3 = $conexao->query($sql);

if ($resultado3->num_rows > 0) {
    echo "<h3>Vendedores</h3><div class='card-container'>";
    while ($row3 = $resultado3->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h4>Nome: " . $row3['nome'] . "</h4>";
        echo "<p>CPF: " . $row3['cpf'] . "</p>";
        echo "<p>Endereço: " . $row3['endereco'] . "</p>";
        echo "<a class='btn' href='alterarVendedor.php?cpf=" . $row3['cpf'] . "'>Alterar</a>";
        echo "<a class='btn' href='ExcluirVendedor.php?cpf=" . $row3['cpf'] . "'>Excluir</a>";
        echo "</div>";
    }


    echo "</div>";
} 

$sql = "SELECT vendas.id, vendas.valor_da_venda, vendas.forma_de_pagamento, vendas.CPFcliente, vendas.cpfVendedor, vendas.codigoProduto, vendas.data_da_venda, clientes.nome as Cliente, vendedor.nome as Vendedor, produtos.nome as Produto FROM vendas join clientes on CPFcliente = clientes.cpf join vendedor on cpfVendedor = vendedor.cpf join produtos on codigoProduto = produtos.codigo;";
$resultado4 = $conexao->query($sql);

if ($resultado4->num_rows > 0) {
    echo "<h3>Vendas</h3><div class='card-container'>";
    while ($row4 = $resultado4->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h4>valor_da_venda: " . $row4['valor_da_venda'] . "</h4>";
        echo "<p>forma_de_pagamento: " . $row4['forma_de_pagamento'] . "</p>";
        echo "<p>CPFcliente: " . $row4['CPFcliente'] . "</p>";
        echo "<p>cpfVendedor: " . $row4['cpfVendedor'] . "</p>";
        echo "<p>Cliente: " . $row4['Cliente'] . "</p>";
        echo "<p>vendedor: " . $row4['Vendedor'] . "</p>";
        echo "<p>produtos: " . $row4['Produto'] . "</p>";
        echo "<p>codigoProduto: " . $row4['codigoProduto'] . "</p>";
        echo "<p>data_da_venda: " . $row4['data_da_venda'] . "</p>";
        echo "<a class='btn' href='ExcluirVenda.php?id=" . $row4['id'] . "'>Excluir</a>";
        echo "</div>";
    }

    
    echo "</div>";
}

echo '</div>';
echo '</body>';
echo '</html>';
?>
