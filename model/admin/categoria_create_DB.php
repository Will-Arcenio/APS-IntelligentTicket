<?php
    session_start();

    include('../../Conexao/conexao.php');

    $nome = $_POST['nome'];
    $url  = $_POST['url'];

    # Criando categoria
    $sqlInstruct = "INSERT INTO categorias (nome, url) VALUES ('{$nome}', '{$url}')";

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {
        $_SESSION['cat_created'] = [
            'created' => 1
        ];
        header('Location: ../../view/page/admin/lista_categoria.php');
    } else {
        $_SESSION['cat_created'] = [
            'created' => 0,
            'msg'     => mysqli_error($conexao)
        ];
        header('Location: ../../view/page/admin/lista_categoria.php');
    }

?>
