<?php

include('../../Conexao/conexao.php');

$id = @($_GET['id'] ? $_GET['id'] : '');

// Verifica se ID veio na URL
if ($id) {
    $sqlInstruct = "DELETE FROM eventos WHERE id = '{$id}'";
    
    $query = mysqli_query($conexao, $sqlInstruct);
    if ($query) {
        header('Location: ../../view/page/admin/lista_evento.php?deleted=1');
    } else {
        echo $query.mysqli_error($conexao);
    }
}