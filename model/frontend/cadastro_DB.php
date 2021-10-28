<?php
    include('../../Conexao/conexao.php');

    $nome     = $_POST['nome'];
    $cpf      = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email    = $_POST['email'];
    $senha    = md5($_POST['senha']);

    $usuario = explode(' ', $nome);

    $sqlInstruct = "INSERT INTO usuarios (usuario, nome, cpf, endereco, telefone, email, senha, acesso) VALUES ('{$usuario[0]}', '{$nome}', '{$cpf}', '{$endereco}', '{$telefone}', '{$email}', '{$senha}', '2')";

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {
        header('Location: ../../view/page/frontend/html/homepage.php?account_create=1#msg-here');
    } else {
        echo mysqli_error($conexao);
    }