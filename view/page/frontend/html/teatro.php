<?php 
    include('../../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM categorias where id = 5";

    
    $query1 = mysqli_query($conexao, $sqlInstruct);
    $eventoInfos = mysqli_fetch_array($query1, MYSQLI_ASSOC);
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
        <title><?php echo $eventoInfos['nome'] ?> | Bla³</title>
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
                    <h1 class="title-bread"><?php echo $eventoInfos['nome'] ?></h1>
                </div> 
            </div>
        </div>
    </div>   
    <div class="category-eventos">
        <div class="evento-grid col-md-12 hide-addtolinks hide-addtocart">
            <div class="container">
                <div class="row">
                    <?php
                         $sqlInstructEvent = "SELECT eventos.*, categorias.nome AS categoria FROM eventos INNER JOIN categorias ON (eventos.id_categoria = categorias.id) WHERE eventos.id_categoria = '5'";
                         $queryEvent = mysqli_query($conexao, $sqlInstructEvent);

                        if (!$queryEvent) {                        
                    ?>
                        <div>
                            <span>Esta categoria está vazia.</span>
                        </div>
                    <?php 
                        } else {
                            $html = '';
                            while ($evento = mysqli_fetch_array($queryEvent, MYSQLI_ASSOC)) {
                                $html = '<div class="item col-md-3">
                                            <div class="evento-image-area">
                                                <a href="../../frontend/html/view.php?id='.$evento['id'].'">
                                                    <img class="img-responsive" alt="'.$evento['nome'].'" src="../../../../skins/images/eventos/'.$evento['url_imagem'].'">
                                                </a>
                                            </div>
                                            <div class="caption">
                                                <h4>'.$evento['nome'].'</h4>
                                                <p>R$ '.$evento['preco_unitario'].'</p>
                                            </div>
                                            <div class="botaoComprar">
                                                <a href="carrinho.php?id='.$evento['id'].'" class="btnFinalizar">Adicionar ao carrinho</a>
                                            </div>      
                                        </div>';
                        
                                echo $html;
                            } 
                        }
                    ?>                     
                </div>
            </div>
        </div>
    </div>    
</body>
<?php 
    # FOOTER
    include('footer.php');
?>
</html>