<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../../../skins/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../../skins/css/bootstrap-theme.min.css">
        <script src="../../../../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../../../skins/css/estilo.css">
        <link rel="stylesheet" href="../../../../skins/css/style.css">
        <title>Checkout | Bla³</title>
    </head>
    <body>
    <?php
        session_start(); //inicia a sessão

        //verificar se o usuario esta logado
        if (!$_SESSION['logged']) {
           header('Location: login.php');
        }
 
        # CABEÇALHO
        include('header.php');

        //verificando se o id esta vazio
        if(!empty($_GET['id'])){
        
            //inserindo o codigo do produto na var id_produto
            $id_produto = $_GET['id'];

            //se a session nao estiver setada
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }

            if(!isset($_SESSION['carrinho'][$id_produto])){
                $_SESSION['carrinho'][$id_produto]=1;
            }else{
                $_SESSION['carrinho'][$id_produto]+=1;
            }

            include ('mostra_checkout.php');
        }else{
            include ('mostra_checkout.php');
        }
    ?>

</body>

<?php 
    # FOOTER
    include('footer.php');
?>