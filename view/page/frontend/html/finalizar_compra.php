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
        <title>Checkout | Bla²</title>
    </head>
    <body>
        <?php 
            include('header.php'); 


            session_start(); 

            include('../../../../Conexao/conexao.php');            

            $data_pedido       = date ('Y-m-d');
            $data_pagamento    = date ('Y-m-d');
            $id_user           = $_POST['id_cliente'];
            $id_formapagamento = $_POST['id_formapagamento'];
            $valor_total       = $_POST['valor_total'];

            foreach ($_SESSION['carrinho'] as $id => $qtd){
                $sqlInstructCart = "SELECT preco_unitario FROM `eventos` WHERE id='$id'";
                $queryHome = mysqli_query($conexao, $sqlInstructCart);
                $exibe = mysqli_fetch_array($queryHome, MYSQLI_ASSOC);
    
                $preco  = number_format(($exibe['preco_unitario']),2,',','.');

                $sqlInstruct = "INSERT INTO pedidos (data_pedido, data_pagamento, id_formapagamento, id_cliente, valor_total) VALUES
                 ('{$data_pedido}', '{$data_pagamento}', '{$id_formapagamento}', '{$id_user}', '{$valor_total}')";

                $query = mysqli_query($conexao, $sqlInstruct); 
            }
            
        ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="container relative">
                    <ul class="bc-links">
                        <li class="Cart">
                        </li>
                    </ul>
                    <h1 class="title-bread">Checkout</h1>
                </div> 
            </div>
        </div>
    </div>
    

</body>

<?php 
    # FOOTER
    include('footer.php');
?>