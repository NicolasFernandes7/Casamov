<?php

require 'config.php';


$valor_da_venda = $_POST['valor_da_venda'];
$forma_de_pagamento = $_POST['forma_de_pagamento'];
$CPFcliente = $_POST['CPFcliente'];
$cpfVendedor = $_POST['cpfVendedor'];
$codigoProduto = $_POST['codigoProduto'];
$data_da_venda = $_POST['data_da_venda'];




$sql2 = "SELECT quantidade from produtos where codigo = ?; ";
$sqlselect = $conexao->prepare($sql2);
$sqlselect->bind_param('i', $codigoProduto);
$sqlselect->execute();

$resultado = $sqlselect->get_result();
if ($resultado->num_rows > 0){
    while($Linha = $resultado->fetch_assoc()){
        $quantidadeatual = $Linha['quantidade'];
        if($quantidadeatual > 0){
            $sql = "INSERT into vendas (valor_da_venda, forma_de_pagamento, CPFcliente, cpfVendedor, codigoProduto, data_da_venda) values (?,?,?,?,?,?);";
            $sqlinsert = $conexao->prepare($sql);
            $sqlinsert->bind_param('isiiis', $valor_da_venda, $forma_de_pagamento,$CPFcliente,$cpfVendedor,$codigoProduto, $data_da_venda );
            $sqlinsert->execute();
            $novoestoque = $quantidadeatual - 1;

            $sql3 = "UPDATE produtos set quantidade = $novoestoque;";
            $sqlupdate = $conexao->query($sql3);
            if ($sqlupdate ){
                header('location:CadastrarVendas.php');
            }else {
                echo"erro ao atualizar";
            }

        
        }else{
            echo"erro ao fazer a Venda, estoque insuficiente.";
        }
        }
    }