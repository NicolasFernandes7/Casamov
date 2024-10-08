<?php
require 'config.php';
session_start();

$CPF = $_GET['CPF'];
$_SESSION['CPF'] = $CPF;

$sql = "SELECT nome, endereco, telefone FROM clientes WHERE CPF = ?;";
$sqlselect = $conexao->prepare($sql);
$sqlselect->bind_param("i", $CPF);
$sqlselect->execute();
$resultado = $sqlselect->get_result();

if ($resultado->num_rows > 0) {
    $Linha = $resultado->fetch_assoc();
    $nome = $Linha['nome'];
    $endereco = $Linha['endereco'];
    $telefone = $Linha['telefone'];
} else {
    echo "<script>alert('Usuário não encontrado, verifique os dados e tente novamente.'); window.history.back();</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cliente</title>
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
    <h2>Alterar Dados do Cliente</h2>
    <form method="POST" action="AtualizarCliente.php">
        <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required placeholder="Nome">
        <input type="text" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>" required placeholder="Endereço">
        <input type="text" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required placeholder="Telefone">
        <button type="submit">Atualizar</button>
    </form>
</div>

</body>
</html>
