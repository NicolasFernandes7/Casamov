<?php

$servidor = "localhost";
$banco = "casamov";
$usuario = "root";
$senha = "";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if($conexao->error){
    echo "falha ao conectar no banco de dados";
}