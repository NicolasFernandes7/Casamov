<?php

require 'config.php';

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$sql = "INSERT into produtos (nome, marca, valor, quantidade) values (?,?,?,?);";
$sqlinsert = $conexao->prepare($sql);
$sqlinsert->bind_param('ssdi', $nome, $marca, $preco, $quantidade);
$sqlinsert->execute();

header('location:CadastrarProduto.php');