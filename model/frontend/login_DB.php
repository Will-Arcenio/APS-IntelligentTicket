<?php

include('../../Conexao/conexao.php');

// Dados do Formulário de Login - Frontend
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sqlInstruct = "SELECT id, usuario, senha, acesso FROM usuarios WHERE usuario='{$email}' AND acesso=2";

$query = mysqli_query($conexao, $sqlInstruct);
$usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($query) {
    if (($usuario['usuario'] == $email) && ($usuario['senha'] == $senha)) {
        header('Location: ../../view/page/frontend/login.php');
    } else {
        header('Location: ../../view/page/frontend/login.php?erro=userPwd');
    }
}

mysqli_close($conexao);