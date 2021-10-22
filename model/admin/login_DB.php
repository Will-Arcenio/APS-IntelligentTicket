<?php

include('../../Conexao/conexao.php');

// Dados do Formulário de Login - Painel Adm
$login = $_POST['login'];
$senha = md5($_POST['senha']);

$sqlInstruct = "SELECT id, usuario, senha, acesso FROM usuarios WHERE usuario='{$login}' AND acesso=1";

$query = mysqli_query($conexao, $sqlInstruct);
$usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($query) {
    if (($usuario['usuario'] == $login) && ($usuario['senha'] == $senha)) {
        header('Location: ../../view/page/admin/painel_admin.php');
    } else {
        header('Location: ../../view/page/admin/login.php?erro=userPwd');
    }
}

mysqli_close($conexao);