<?php

include('../../Conexao/conexao.php');


$percentual_publico  = $_POST['percentual_publico'];
$qtd_pedidos         = $_POST['qtd_pedidos'];
$percentual_desconto = $_POST['percentual_desconto'];

if (trim($percentual_publico) == '' || trim($percentual_publico) > 100 || 
        trim($qtd_pedidos) < 0 || trim($qtd_pedidos) == '' || 
        trim($percentual_desconto) == '' || trim($percentual_desconto > 100)) 
{
    header('Location: ../../view/page/admin/configuracoes.php?error=1');
} else {
    $sql1   = "UPDATE config SET valor = '{$percentual_publico}' WHERE nome = 'percentual_publico'";
    $sql2   = "UPDATE config SET valor = '{$qtd_pedidos}' WHERE nome = 'qtd_pedidos'";
    $sql3   = "UPDATE config SET valor = '{$percentual_desconto}' WHERE nome = 'percentual_desconto'";
    $query1 = mysqli_query($conexao, $sql1);
    $query2 = mysqli_query($conexao, $sql2);
    $query3 = mysqli_query($conexao, $sql3);
    
    if ($query1 && $query2 && $query3) {
        header('Location: ../../view/page/admin/configuracoes.php?success=1');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);