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
        <title>Carrinho | Intelligent Ticket</title>
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
                    <h1 class="title-bread">Seu carrinho</h1>
                </div> 
            </div>
        </div>
    </div>
    <div class="container SeuCarrinho">
        <div class="conteudo col-md-8  col-xs-12">      
            <table id="shopping-cart-table" class="data-table cart-table">
                <thead>
                    <tr class="first last">
                        <th rowspan="1"><span class="nobr">Ingressos</span></th>
                        <th rowspan="1">&nbsp;</th>
                        <th rowspan="1">&nbsp;</th>
                        <th colspan="1"><span class="nobr">Preço Unitário</span></th>
                        <th rowspan="1">Quantidade</th>
                        <th class="1" colspan="1">Subtotal</th>
                        <th rowspan="last"></th>
                    </tr>
                </thead>
                <tbody>
    <?php
        $total    = null;
        $subTotal = 0;
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
            $total = $exibe['preco_unitario'] * $qtd;
            $subTotal += $exibe['preco_unitario'] * $qtd;           

 
    
        $html = '<tr class="first last odd">
                    <td class="img"><img class="img-responsive" width="70" src="../../../../skins/images/eventos/'.$exibe['url_imagem'].'"></td>
                    <td colspan="2" class="product-name-td">
                        <span class="product-name">'.$exibe['nome'].'</span>
                    </td>
                    <td class="unit-price">
                        <span class="cart-price">
                        <span class="price">R$'.$exibe['preco_unitario'].'</span>
                        </span>
                    </td>
                    <td class="qtd-cart">
                        <div class="qty-holder">
                        '.$qtd.'
                        </div>
                    </td>
                    <td class="td-total last">
                        <span class="cart-price" id="ing">
                            <span class="price">'.$total.'</span>
                        </span>
                    </td>
                    <td class="td-total last">
                        <span class="remover" id="ing">
                            <a href="remove_carrinho.php?id='.$id.'">X</a>                            
                        </span>
                    </td>
                </tr>';
        echo $html;
        }?>
    </tbody>
</table>
        </div>
        <div class="container">
            <div class="col-md-4 title col-xs-12" style="background-color:#f3f3f3;">
                <h1 class="title">Valores da compra</h1>                
                <div class="conteudo-carrinho-valores col-md-12 col-xs-12">
                    <div class="total col-md-6 col-xs-6 text-left"><span>Total</span></div>
                    <div class="preco col-md-6 col-xs-6 text-right"><span>R$<?php echo number_format(($subTotal),2,',','.'); ?></span></div>                    
                </div>
                <div class="botaoComprar">
                    <a href="checkout.php" class="btnCheck">Finalizar </a>
                </div>
            </div>
        </div>    
    </div>

</body>
