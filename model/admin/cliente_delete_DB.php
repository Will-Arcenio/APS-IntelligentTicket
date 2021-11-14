<?php
# Inicia a sessão e valida
session_start();
if (!$_SESSION['logged']) {
    header('Location: ../../view/page/admin/login.php');
}

include('../../Conexao/conexao.php');

$id = @($_GET['id'] ? $_GET['id'] : '');

// Verifica se ID veio na URL
if ($id) {
    $sqlInstruct = "DELETE FROM clientes WHERE id = '{$id}'";
    $query = mysqli_query($conexao, $sqlInstruct);
    if ($query) {
        header('Location: ../../view/page/admin/lista_cliente.php?deleted=1');
    } else {
        echo $query.mysqli_error($conexao);
    }
}