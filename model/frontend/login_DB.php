<?php

# Inicializa sessão
session_start();

include('../../Conexao/conexao.php');

// Dados do Formulário de Login - Frontend
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sqlInstruct = "SELECT id, nome, email, senha, acesso FROM clientes WHERE email ='{$email}' AND acesso=2";

$query = mysqli_query($conexao, $sqlInstruct);
$usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($query) {
    if (($usuario['email'] == $email) && ($usuario['senha'] == $senha) && ($usuario['acesso'] == 2)) {
        $_SESSION['logged_front'] = [
            'user_name' => $usuario['nome'],
            'user_id' => $usuario['id']
        ];
        header('Location: ../../view/page/frontend/html/cliente_dashboard.php');
    } else {
        header('Location: ../../view/page/frontend/html/login.php?erro=userPwd');
    }
}

mysqli_close($conexao);