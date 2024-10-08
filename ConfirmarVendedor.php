<?php

require 'config.php';

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cpf =$_POST['cpf'];

$sql = "INSERT into vendedor (cpf,nome, endereco) values (?,?,?);";
$sqlinsert = $conexao->prepare($sql);
$sqlinsert->bind_param('iss', $cpf, $nome, $endereco,);
$sqlinsert->execute();

header('location:CadastrarVendedor.php');