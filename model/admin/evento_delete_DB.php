<?php
session_start();

include('../../Conexao/conexao.php');

$id = @($_GET['id'] ? $_GET['id'] : '');

// Verifica se ID veio na URL
if ($id) {
    $sqlInstruct = "DELETE FROM eventos WHERE id = '{$id}'";
    
    $query = mysqli_query($conexao, $sqlInstruct);
    if ($query) {
        $_SESSION['ev_deleted'] = [
            'deleted' => 1
        ];
        header('Location: ../../view/page/admin/lista_evento.php');
    } else {
        echo $query.mysqli_error($conexao);
    }
}