<?php

    include('../../Conexao/conexao.php');

    $id                        = $_POST['id'];
    $nome                      = $_POST['nome'];
    $url                       = $_POST['url'];

    $sqlInstruct = "UPDATE categorias SET nome = '{$nome}', url = '{$url}' WHERE id = '{$id}'";

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {
        header('Location: ../../view/page/admin/lista_categoria.php?updated=1&categoria_id=' . $id);
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }