<?php
require 'config.php';

$cpf = $_GET['cpf'];

$sql = "DELETE FROM vendedor WHERE cpf = ?;";
$sqldelete = $conexao->prepare($sql);
$sqldelete->bind_param("i", $cpf);
$sqldelete->execute();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Vendedor</title>
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
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Resultado da Exclusão</h2>
    <?php
    if ($sqldelete) {
        echo "<p>Exclusão realizada com sucesso!</p>";
        echo '<a class="btn" href="consultar.php">Voltar</a>';
    } else {
        echo "<p>Error ao excluir, tente novamente.</p>";
        echo '<a class="btn" href="javascript:history.back()">Tentar Novamente</a>';
    }
    ?>
</div>

</body>
</html>
