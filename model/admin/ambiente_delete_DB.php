<?php

# Inicia a sessão e valida
session_start();
if (!$_SESSION['painel-logged']) {
    header('Location: ../../view/page/admin/login.php');
}

include('../../Conexao/conexao.php');

$id = @($_GET['id'] ? $_GET['id'] : '');

// Verifica se ID veio na URL
if ($id) {
    $sqlInstruct = "DELETE FROM ambientes WHERE id = '{$id}'";
    $query = mysqli_query($conexao, $sqlInstruct);
    if ($query) {
        $_SESSION['amb_deleted'] = [
            'deleted' => 1
        ];
        header('Location: ../../view/page/admin/lista_ambiente.php');
    } else {
        echo $query.mysqli_error($conexao);
    }
}