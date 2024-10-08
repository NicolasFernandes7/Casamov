<?php

require 'config.php';

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$data_de_nascimento = $_POST['data_de_nascimento'];
$telefone = $_POST['telefone'];
$CPF =$_POST['CPF'];

$sql = "INSERT into clientes (CPF,nome, endereco, data_de_nascimento, telefone) values (?,?,?,?,?);";
$sqlinsert = $conexao->prepare($sql);
$sqlinsert->bind_param('ssssi', $CPF, $nome, $endereco, $data_de_nascimento, $telefone);
$sqlinsert->execute();

header('location:CadastrarClientes.php');