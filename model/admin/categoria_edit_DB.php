<?php
    session_start();

    include('../../Conexao/conexao.php');

    $id                        = $_POST['id'];
    $nome                      = $_POST['nome'];
    $url                       = $_POST['url'];

    $sqlInstruct = "UPDATE categorias SET nome = '{$nome}', url = '{$url}' WHERE id = '{$id}'";

    $query = mysqli_query($conexao, $sqlInstruct);

    if ($query) {
        $_SESSION['cat_updated'] = [
            'updated'      => 1,
            'categoria_id' => $id
        ];
        header('Location: ../../view/page/admin/lista_categoria.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }