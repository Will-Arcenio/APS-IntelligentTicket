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
    $sqlInstruct = "DELETE FROM clientes WHERE id = '{$id}'";
    $query = mysqli_query($conexao, $sqlInstruct);
    if ($query) {
        $_SESSION['cli_deleted'] = [
            'deleted' => 1
        ];
        header('Location: ../../view/page/admin/lista_cliente.php');
    } else {
        echo $query.mysqli_error($conexao);
    }
}