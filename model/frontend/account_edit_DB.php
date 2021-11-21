<?php
session_start();

include('../../Conexao/conexao.php');

$id = $_SESSION['logged_front']['user_id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = (!$_POST['senha'] ? '' : md5($_POST['senha']));

if ($senha == '') {
    $sqlEditCliente = "UPDATE clientes SET nome = '{$nome}', cpf = '{$cpf}', endereco = '{$endereco}', telefone = '{$telefone}', email = '{$email}' WHERE id = '{$id}'";
} else {
    $sqlEditCliente = "UPDATE clientes SET nome = '{$nome}', cpf = '{$cpf}', endereco = '{$endereco}', telefone = '{$telefone}', email = '{$email}', senha = '{$senha}' WHERE id = '{$id}'";
}

$query = mysqli_query($conexao, $sqlEditCliente);

if ($query) {
    $_SESSION['cli_info_update'] = true;
    header('Location: ../../view/page/frontend/html/cliente_dashboard.php');
} else {
    echo mysqli_error($conexao);
}