<?php
require 'config.php';
session_start();

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$preco = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$codigo = $_SESSION['codigo'];

$sql = "UPDATE produtos SET nome = ?, marca = ?, valor = ?, quantidade = ? WHERE codigo = ?;";
$sqlupdate = $conexao->prepare($sql);
$sqlupdate->bind_param("ssdii", $nome, $marca, $preco, $quantidade, $codigo);
$sqlupdate->execute();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Produto</title>
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
            max-width: 400px;
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
        p {
            margin: 15px 0;
            font-size: 1.2em;
        }
        .btn {
            background-color: #ff6347;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Resultado da Atualização</h2>
    <?php
    if ($sqlupdate) {
        echo "<p>Atualizado com sucesso!</p>";
        echo '<a class="btn" href="Consultar.php">Voltar para Produtos</a>';
    } else {
        echo "<p>Erro ao atualizar, verifique os dados e tente novamente.</p>";
        echo '<a class="btn" href="javascript:history.back()">Tentar Novamente</a>';
    }
    ?>
</div>

</body>
</html>
