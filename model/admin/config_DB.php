<?php

include('../../Conexao/conexao.php');


$percentual_publico = $_POST['percentual_publico'];

if ($percentual_publico == '' || $percentual_publico > 100) {
    header('Location: ../../view/page/admin/configuracoes.php?error=1');
} else {
    $sql   = "UPDATE config SET valor = '{$percentual_publico}' WHERE nome = 'percentual_publico'";
    $query = mysqli_query($conexao, $sql);
    
    if ($query) {
        header('Location: ../../view/page/admin/configuracoes.php?success=1');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);