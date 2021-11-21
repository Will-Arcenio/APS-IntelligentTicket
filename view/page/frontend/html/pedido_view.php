<?php

session_start();

if (!$_SESSION['logged']) {
    header('Location: login.php');
}

include('../../../../Conexao/conexao.php');

# Get Pedido Id
$idPedido = $_GET['id'];

#var_dump($idPedido);
?>

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
    <title>Pedido #<?php echo $idPedido ?> | Painel Bla³</title>
</head>
<body>
    <?php 
        # CABEÇALHO
        include('header.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 login-box">
                <div class="page-title text-center">
                    <h3>Informações do Pedido #<?php echo $idPedido ?></h3>
                </div>
                <?php
                $sqlPedido   = "SELECT *, fp.nome AS forma_pagamento FROM pedidos INNER JOIN formas_pagamento AS fp ON (fp.id = pedidos.id_formapagamento) WHERE pedidos.id = '{$idPedido}'";
                #var_dump($sqlPedido);
                $queryPedido = mysqli_query($conexao, $sqlPedido);
                $pedido      = mysqli_fetch_array($queryPedido, MYSQLI_ASSOC);
                ?>
                <form action="../../../../model/frontend/cadastro_DB.php" method="POST" class="login-form">
                    <div class="row">
                        <!-- <div class="col-md-2">
                            <label>Código</label>
                            <input type="text" name="id" id="id" readonly="true" class="campo" required="required">
                        </div> -->
                        <div class="col-md-6">
                            <label >Código: </label>
                            <span><?php echo $pedido['id'] ?></span>
                        </div>
                        <div class="col-md-6">
                            <label>Data: </label>
                            <span class=""><?php echo date('d/m/Y', strtotime($pedido['data_pedido'])) ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Data Pagamento: </label>
                            <?php
                            if ($pedido['data_pagamento'] == '0000-00-00 00:00:00') {
                            ?>
                                <span class="">Pendente</span>
                            <?php
                            } else {                       
                            ?>
                                <span><?php echo date('d/m/Y', strtotime($pedido['data_pagamento'])) ?></span>
                            <?php
                            }
                            ?>
                            
                        </div>
                        <div class="col-md-6">
                            <label>Forma de Pagamento: </label>
                            <span><?php echo $pedido['forma_pagamento'] ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Parcela(s): </label>
                            <span><?php echo $pedido['qtd_parcelas'] ?>x</span>
                        </div>
                        <div class="col-md-6">
                            <label>Valor Total: </label>
                            <span>R$ <?php echo number_format($pedido['valor_total'], 2, ',', ' ') ?></span>
                        </div>
                    </div>     
                    <br>   
                    <br>          
                    <div class="botao-div">
                        <button type="submit" name="criar_conta" class="botao">Criar Conta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>