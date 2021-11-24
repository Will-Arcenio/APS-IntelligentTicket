<?php 
    include('../../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM clientes where id = '{$_SESSION['logged_front']['user_id']}'";

    
    $query1 = mysqli_query($conexao, $sqlInstruct);
    $clienteInfos = mysqli_fetch_array($query1, MYSQLI_ASSOC);
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
        <title>Checkout | Bla³</title>
    </head>
    <body>
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
    <div class="container SeuCheckout">
        <div class="conteudo col-md-12 col-xs-12">
            <div class="row">
                <div class="info-cliente cinza col-md-4 col-xs-12">
                    <div class="step-title step-1">Cliente</div>
                    <div class="step-body dados-user">
                        <div class="col-md-12">
                            <p><strong>Nome:</strong> <span><?php echo $clienteInfos['nome'] ?></span></p>
                            <p><strong>E-mail:</strong> <span><?php echo $clienteInfos['email'] ?></span></p>
                            <p><strong>CPF: </strong><span><?php echo $clienteInfos['cpf'] ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="info-pagamento branco col-md-4 col-xs-12">
                    <div class="step-title step-1">Forma de Pagamento</div>
                        <div class="step-body branco dados-user">
                        <?php
                        $sqlInstructPagamento = "SELECT * FROM `formas_pagamento`";
                        $queryPagamento = mysqli_query($conexao, $sqlInstructPagamento);

                        if (!$queryPagamento) {                        
                            ?>
                            <div>
                                <span>Formas de pagamento indisponíveis.</span>
                            </div>
                            <?php 
                        } else {
                            $html = '';

                            while ($fpagamento = mysqli_fetch_array($queryPagamento, MYSQLI_ASSOC)) {
                                $html =' <div class="col-md-12 col-xs-12">
                                            <div class="col-md-2 col-xs-2"> 
                                                <input type="radio" id="'.$fpagamento['nome'].'" name="forma-pagamento" value="'.$fpagamento['nome'].'" checked="checked">
                                            </div>
                                            <div class="col=md-10 col-xs-10">
                                                <span for="'.$fpagamento['nome'].'">'.$fpagamento['nome'].'</span>
                                            </div>
                                        </div>' ;
                            
                                echo $html;
                            } 
                        }
                    ?> 
                    </div>
                </div>
                <div class="info-pedido cinza col-md-4 col-xs-12">
                <div class="step-title step-1">Meu pedido</div>
                <?php
                $sqlPedidos = "SELECT COUNT(id) AS qtdPedidos FROM pedidos WHERE id_cliente = {$_SESSION['logged_front']['user_id']}";
                // var_dump($sqlPedidos);
                $queryQtdPedido = mysqli_query($conexao, $sqlPedidos);

                # Qtd pedidos do cliente
                $qtdPedido = mysqli_fetch_array($queryQtdPedido, MYSQLI_ASSOC);


                $configQtdPedidos = 0;
                $configPercentualDesconto = 0;

                # Pega Config
                $sqlConfig = "SELECT * FROM config";
                $queryConfig = mysqli_query($conexao, $sqlConfig);
                while ($configs = mysqli_fetch_array($queryConfig, MYSQLI_ASSOC)) {
                    if ($configs['nome'] == 'qtd_pedidos') {
                        $configQtdPedidos = $configs['valor'];
                    } elseif($configs['nome'] == 'percentual_desconto') {
                        $configPercentualDesconto = $configs['valor'];
                    }
                }
                var_dump($configQtdPedidos);
                var_dump($configPercentualDesconto);
                ?>
                    <div class="step-body dados-user">
                    <?php
                        $total = null;
                        if(!isset($_SESSION['carrinho'])){
                            $_SESSION['carrinho'] = array();
                        }
                        //criando um loop p sessao carrinho que recebe o id e a quant
                        foreach ($_SESSION['carrinho'] as $id => $qtd){
                            $sqlInstructCart = "SELECT * FROM `eventos` WHERE id='$id'";
                            $queryHome = mysqli_query($conexao, $sqlInstructCart);
                            $exibe = mysqli_fetch_array($queryHome, MYSQLI_ASSOC);

                            $evento_nome = $exibe['nome'];
                            $preco  = number_format(($exibe['preco_unitario']),2,',','.');
                            $total += $exibe['preco_unitario'] * $qtd;                
                    
                            $html = '<div class="col-md-12 col-xs-12 pedidos">
                                        <div class="col-md-3 col-xs-3">
                                            <td class="img"><img class="img-responsive" width="70" src="../../../../skins/images/eventos/'.$exibe['url_imagem'].'"></td>
                                        </div>
                                        <div class="col-md-3 col-xs-3"> 
                                                <span class="product-name">'.$exibe['nome'].'</span>
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <span class="price">R$'.$exibe['preco_unitario'].'</span>
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                                <div class="qty-holder">
                                                    Qtd: '.$qtd.'
                                                </div>
                                        </div>
                                    </div>';
                                echo $html;
                                }?>
                                <?php
                                # Calcula total setiver desconto
                                if (($qtdPedido['qtdPedidos'] == $configQtdPedidos) && ($total != 0)) {
                                    if ($configQtdPedidos > 0 && $configPercentualDesconto > 0 && $configPercentualDesconto <= 100) {
                                        $total = $total - ($total * ($configPercentualDesconto/100));
                                    }
                                }
                                ?>
                                <div class="conteudo-checkout-valores col-md-12 col-xs-12">
                                    <div class="total col-md-6 col-xs-6 text-left"><span>Total</span></div>
                                    <div class="preco col-md-6 col-xs-6 text-right"><span>R$<?php echo number_format(($total),2,',','.'); ?></span></div>                    
                                </div>
                                <div class="botaoComprar">
                                    <?php 
                                        $_SESSION['compraFinalizada'] = true;
                                    ?>
                                    <a href="sucesso.php" class="btnCheck">Finalizar </a>
                                </div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
    </div>
</body>
