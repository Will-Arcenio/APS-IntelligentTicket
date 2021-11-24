<?php

session_start();

if (!$_SESSION['logged_front']) {
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
    <div class="container dash-pedido-info">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-back">
                    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="icon-arrow-left2"></i> Voltar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pedido-view-box text-center">
                <div class="pedido-view-title text-center">
                    <h3>Informações do Pedido #<?php echo $idPedido ?></h3>
                </div>
                <?php

                $sqlPedido   = "SELECT pedidos.id, pedidos.data_pedido, pedidos.data_pagamento, pedidos.id_formapagamento, pedidos.qtd_parcelas, pedidos.id_cliente, pedidos.valor_total, fp.nome AS forma_pagamento FROM pedidos INNER JOIN formas_pagamento AS fp ON (fp.id = pedidos.id_formapagamento) WHERE pedidos.id = '{$idPedido}'";
                
                #$sqlPedido = "SELECT ip.id_ingresso AS ingPedido_Ingresso, ip.id_pedido AS ingPedido_Pedido, ip.qtd_ingressos AS ingPedido_QtdIngresso, i.id_evento AS i_EventoId, ev.nome AS nomeEvento, ev.emite_certificado AS emiteCertificado, ev.ev_cancelado AS Cancelado, cli.id AS clienteId, cli.nome AS clienteNome FROM ingresso_pedido AS ip LEFT JOIN ingressos AS i ON(i.id = ip.id_ingresso) INNER JOIN eventos AS ev ON(i.id_evento = ev.id) INNER JOIN pedidos AS p ON(ip.id_pedido = p.id) INNER JOIN clientes AS cli ON(cli.id = p.id_cliente)";
                
                $queryPedido = mysqli_query($conexao, $sqlPedido);
                $pedido      = mysqli_fetch_array($queryPedido, MYSQLI_ASSOC);
                // echo '<br><pre>';
                // var_dump($sqlPedido);
                // echo '<br>';
                // var_dump($pedido);
                // echo '</pre>';
                ?>
                <div class="pedido-view">
                    <div class="row">
                        <!-- <div class="col-md-2">
                            <label>Código</label>
                            <input type="text" name="id" id="id" readonly="true" class="campo" required="required">
                        </div> -->
                        <div class="col-md-6 left-side">
                            <label >Código: </label>
                            <span><?php echo $pedido['id'] ?></span>
                        </div>
                        <div class="col-md-6 right-side">
                            <label>Data Pedido: </label>
                            <span class=""><?php echo date('d/m/Y', strtotime($pedido['data_pedido'])) ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 left-side">
                            <label>Data Pagamento: </label>
                            <?php
                            if ($pedido['data_pagamento'] == '0000-00-00 00:00:00') {
                            ?>
                                <span class="">Pagamento Pendente</span>
                            <?php
                            } else {                       
                            ?>
                                <span><?php echo date('d/m/Y', strtotime($pedido['data_pagamento'])) ?></span>
                            <?php
                            }
                            ?>
                            
                        </div>
                        <div class="col-md-6 right-side">
                            <label>Forma de Pagamento: </label>
                            <span><?php echo $pedido['forma_pagamento'] ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 left-side">
                            <label>Parcela(s): </label>
                            <span><?php echo $pedido['qtd_parcelas'] ?>x</span>
                        </div>
                        <div class="col-md-6 right-side">
                            <label>Valor Total: </label>
                            <span>R$ <?php echo number_format($pedido['valor_total'], 2, ',', ' ') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>