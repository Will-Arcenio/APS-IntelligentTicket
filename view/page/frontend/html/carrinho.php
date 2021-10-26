<!DOCTYPE html>
<html lang="pt-BR">
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
    <?php 
        # CABEÇALHO
        include('header.php');
    ?>
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
                        <th class="last" colspan="1">Subtotal</th>
                    </tr>
                </thead>
                <tfoot>
                <tr class="first last">
                    <td colspan="50" class="a-right last">
                        <button type="submit" name="limpar-carrinho" value="limpar-carrinho" title="Limpar Carrinho" class="limpar-carrinho" id="limpar-carrinho">Limpar Carrinho (FAZER DINAMICO)</button>
                    </td>
                </tr>
                </tfoot>
                <tbody>
                    <tr class="first last odd">
                        <td class="pr-img-td"><a href="" title="EVENTO PADRÃO" class="product-image"><img src="../../../../skins/images/ticket.png" alt="evento padrão"></a></td>
                        <td colspan="2" class="product-name-td">
                            <span class="product-name"> EVENTO PADRÃO</span>
                        </td>
                        <td class="unit-price">
                            <span class="cart-price">
                                <span class="price">R$60,00</span>
                            </span>
                        </td>
                        <td class="qtd-cart">
                            <div class="qty-holder">
                            1
                            </div>
                        </td>
                        <td class="td-total last">
                            <span class="cart-price" id="ing">
                                <span class="price">R$60,00</span>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="col-md-4 title col-xs-12" style="background-color:#f3f3f3;">
                <h1 class="title">Valores da compra</h1>                
                <div class="conteudo-carrinho-valores col-md-12 col-xs-12">
                    <div class="subtotal col-md-6 col-xs-6 text-left"><span>Subtotal</span></div>
                    <div class="preco col-md-6 col-xs-6 text-right"><span>R$60,00</span></div>
                    <div class="total col-md-6 col-xs-6 text-left"><span>Total</span></div>
                    <div class="preco col-md-6 col-xs-6 text-right"><span>R$60,00</span></div>                    
                </div>
                <button class="btnFinalizar" type="submit" name="btnFinalizar">Finalizar </button>
            </div>
        </div>    
    </div>

</body>

<?php 
    # FOOTER
    include('footer.php');
?>