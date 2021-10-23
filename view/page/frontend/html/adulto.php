<?php 
    include('../../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM eventos where id_categoria = '6'";
    $query1 = mysqli_query($conexao, $sqlInstruct);
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
        <title>Adulto | Bla³</title>
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
                    <h1 class="title-bread">Adulto</h1>
                </div> 
            </div>
        </div>
    </div>   
    <div class="category-eventos">
        <div class="evento-grid col-md-12 hide-addtolinks hide-addtocart">
            <div class="container">
                <div class="row">
                    <?php
                        if (!$query1) {                        
                    ?>
                        <div>
                            <span>Esta categoria está vazia.</span>
                        </div>
                    <?php 
                        } else {
                            $html = ''; 
                            while ($evento = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                                $html = '<div class="item col-md-3">
                                        <div class="evento-image-area">
                                            <a href="!#" title="" class="evento-image">
                                                <img class="img-responsive" alt="'.$evento['nome'].'" src="../../../../skins/images/eventos/'.$evento['imagem'].'.png">
                                            </a>
                                        </div>
                                        <div class="details-area">
                                            <h3 class="evento-name"><a href="'.$evento['url'].'.php" title="'.$evento['nome'].'">'.$evento['nome'].'</a></h3>
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