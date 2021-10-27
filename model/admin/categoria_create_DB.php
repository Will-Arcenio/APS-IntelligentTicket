<?php

    include('../../Conexao/conexao.php');

    $nome                      = $_POST['nome'];
    $url                       = $_POST['url'];

    # Criando categoria
    $sqlInstruct = "INSERT INTO categorias (nome, url) VALUES ('{$nome}', '{$url}')";

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {
        header('Location: ../../view/page/admin/lista_categoria.php?success=1');
    } else {
        header('Location: ../../view/page/admin/lista_categoria.php?error=1&msg=' . mysqli_error($conexao));
    }

?>
