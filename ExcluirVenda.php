<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Exclusão</title>
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
        p {
            font-size: 1.2em;
            margin: 20px 0;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #ff6347;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Resultado da Exclusão</h2>
    <?php
    require 'config.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM vendas WHERE id = ?;";
    $sqldelete = $conexao->prepare($sql);
    $sqldelete->bind_param("i", $id);
    $sqldelete->execute();

    if($sqldelete){
        echo "<p>Exclusão realizada com sucesso!</p>";
        echo "<a href='Consultar.php'>Voltar</a>";
    } else {
        echo "<p>Erro ao excluir, tente novamente.</p>";
        echo "<a href='Consultar.php'>Voltar</a>";
    }
    ?>
</div>

</body>
</html>
