<?php

# Inicia sessão
session_start();

include('../../Conexao/conexao.php');

// Dados do Formulário de Login - Painel Adm
$login = $_POST['login'];
$senha = md5($_POST['senha']);

$sqlInstruct = "SELECT id, nome, usuario, senha, acesso FROM clientes WHERE usuario='{$login}' AND acesso=1";

$query = mysqli_query($conexao, $sqlInstruct);
$usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($query) {
    if (($usuario['usuario'] == $login) && ($usuario['senha'] == $senha) && ($usuario['acesso'] = 1)) {
        $_SESSION['painel-logged'] = [
            'user_name' => $usuario['nome'],
            'user_login' => $login,
            'user_login' => $usuario['id']
        ];
        header('Location: ../../view/page/admin/painel_admin.php');
    } else {
        header('Location: ../../view/page/admin/login.php?erro=userPwd');
    }
}

mysqli_close($conexao);