<?php 
    include('../../../../Conexao/conexao.php');
        session_start();

        $busca = $_GET['textbusca'];

        $sqlInstruct = "SELECT * FROM eventos where nome like concat ('%','$busca','%')";
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
        <title>Busca | Bla³</title>
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
                    <h1 class="title-bread">Você buscou por: <?php echo $busca ?></h1>
                </div> 
            </div>
        </div>
    </div>      
    <div class="category-eventos">
        <div class="evento-grid col-md-12 hide-addtolinks hide-addtocart">
            <div class="container">
                <div class="row">
                    <?php 
                            $html = '';
                            while($eventoInfos = mysqli_fetch_array($query1, MYSQLI_ASSOC)){
                                $html = '<div class="item col-md-3">
                                        <div class="evento-image-area">
                                            <a href="!#" title="" class="evento-image">
                                                <img class="img-responsive" alt="'.$eventoInfos['nome'].'" src="../../../../skins/images/eventos/'.$eventoInfos['url_imagem'].'">
                                            </a>
                                        </div>
                                        <div class="caption">
                                                <h4>'.$eventoInfos['nome'].'</h4>
                                                <p>R$ '.$eventoInfos['preco_unitario'].'</p>
                                            </div>
                                        <div class="botaoComprar">
                                            <a href="carrinho.php?id='.$eventoInfos['id'].'" class="btnFinalizar">Adicionar ao carrinho</a>
                                        </div>    
                                    </div>';
                            
                                echo $html;
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