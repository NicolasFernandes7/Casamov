<?php
require 'config.php';
session_start();

$codigo = $_GET['codigo'];
$_SESSION['codigo'] = $codigo;

$sql = "SELECT nome, marca, valor, quantidade FROM produtos WHERE codigo = ?;";
$sqlselect = $conexao->prepare($sql);
$sqlselect->bind_param("i", $codigo);
$sqlselect->execute();
$resultado = $sqlselect->get_result();

if ($resultado->num_rows > 0) {
    $Linha = $resultado->fetch_assoc();
    $nome = $Linha['nome'];
    $marca = $Linha['marca'];
    $preco = $Linha['valor'];
    $quantidade = $Linha['quantidade'];
} else {
    echo "<script>alert('Produto não encontrado, verifique os dados e tente novamente.'); window.history.back();</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
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
        }
        button:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Alterar Dados do Produto</h2>
    <form method="POST" action="AtualizarProduto.php">
        <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required placeholder="Nome">
        <input type="text" name="marca" value="<?php echo htmlspecialchars($marca); ?>" required placeholder="Marca">
        <input type="number" step="0.01" name="valor" value="<?php echo htmlspecialchars($preco); ?>" required placeholder="Valor">
        <input type="number" name="quantidade" value="<?php echo htmlspecialchars($quantidade); ?>" required placeholder="Quantidade">
        <button type="submit">Atualizar</button>
    </form>
</div>

</body>
</html>
