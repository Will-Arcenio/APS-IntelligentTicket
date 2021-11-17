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
        <title>Compre seu ingresso online | Bla³</title>
    </head>
    <body>
    <?php 
        # CABEÇALHO
        include('header.php');
    ?>
   <div class="container">
            <div class="col-md-4 title col-xs-12" style="background-color:#f3f3f3;">
                <h1 class="title">Sucesso</h1>                
                <div class="conteudo-carrinho-valores col-md-12 col-xs-12">
                    <div class="chave col-md-6 col-xs-6 text-left"><span>Chave de acesso:</span></div>
                    <div class="chaveunica col-md-6 col-xs-6 text-right"><span>Venda01</span></div>
                    <div class="Quantidade col-md-6 col-xs-6 text-left"><span>Quantidade de entradas:</span></div>
                    <div class="qtd col-md-6 col-xs-6 text-right"><span>2</span></div>                    
                </div>
            </div>
        </div>    
    <script>
            // Carousel Auto-Cycle
            $(document).ready(function() {
                $('.carousel').carousel({
                interval: 6000
                })
            });
        </script>

    <div class="container os-mais-vendidos">
        <div class="col-md-12 title col-xs-12">
            <h1 class="title">Os mais vendidos</h1>
        </div>
        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
            <div class="item active">
                <ul class="thumbnails">
                <?php
                    $sqlInstructHome = "SELECT * FROM `eventos` WHERE mais_vendido = 'S'";
                    $queryHome = mysqli_query($conexao, $sqlInstructHome);

                    if (!$queryHome) {                        
                        ?>
                        <div>
                            <span>Não possui.</span>
                        </div>
                        <?php 
                    } else {
                        $html = '';

                        while ($evento = mysqli_fetch_array($queryHome, MYSQLI_ASSOC)) {
                            $html ='<li class="col-sm-3">
                                        <div class="fff">
                                            <div class="thumbnail">
                                                <a href="../../frontend/html/view.php?id='.$evento['id'].'"><img src="../../../../skins/images/eventos/'.$evento['url_imagem'].'" alt=""></a>
                                            </div>
                                            <div class="caption">
                                                <h4>'.$evento['nome'].'</h4>
                                                <p>R$ '.$evento['preco_unitario'].'</p>
                                            </div>
                                            <div class="botaoComprar">
                                                <a href="carrinho.php?id='.$evento['id'].'" class="btnFinalizar">Adicionar ao carrinho</a>
                                            </div>
                                        </div>
                                    </li>';
                        
                            echo $html;
                        } 
                    }
                ?>           
                </ul>
                </div>                
            </div>
        </div>
        <script>
            // Carousel Auto-Cycle
            $(document).ready(function() {
                $('.carousel').carousel({
                interval: 6000
                })
            });
        </script>
    </div>
</body>
<?php 
    # FOOTER
    include('footer.php');
?>
</html>