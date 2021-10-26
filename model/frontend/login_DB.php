<?php

include('../../Conexao/conexao.php');

// Dados do Formulário de Login - Frontend
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sqlInstruct = "SELECT id, email, senha, acesso FROM usuarios WHERE email ='{$email}' AND acesso=2";

$query = mysqli_query($conexao, $sqlInstruct);
$usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($query) {
    if (($usuario['email'] == $email) && ($usuario['senha'] == $senha)) {
        header('Location: ../../view/page/frontend/html/homepage.php');
    } else {
        header('Location: ../../view/page/frontend/html/login.php?erro=userPwd');
    }
}

mysqli_close($conexao);