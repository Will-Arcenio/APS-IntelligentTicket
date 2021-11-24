<?php

    include('../../../../Conexao/conexao.php');

    $id = $_GET['id'];
    

    $sqlEvento   = "SELECT eventos.*, categorias.nome AS categoria FROM eventos INNER JOIN categorias ON (eventos.id_categoria = categorias.id) WHERE eventos.id = '{$id}'";
    $queryEvento = mysqli_query($conexao, $sqlEvento);
    $eventoInfos = mysqli_fetch_array($queryEvento, MYSQLI_ASSOC);

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
        <title><?php echo $eventoInfos['categoria'] ?> > <?php echo $eventoInfos['nome'] ?> | Bla³</title>
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
                    <h1 class="title-bread"><?php echo $eventoInfos['categoria'] ?> > <?php echo $eventoInfos['nome'] ?></h1>
                </div> 
            </div>
        </div>
    </div>
    <div class="container imagem-ingresso">
        <div class="conteudo col-md-6  col-xs-12">      
            <img class="img-responsive" src="../../../../skins/images/eventos/<?php echo $eventoInfos['url_imagem'] ?>" alt="blablabla">
        </div>
        <div class="container info-ingresso">
            <div class="info-evento col-md-6 col-xs-12">
                <h1 class="nome-evento"><?php echo $eventoInfos['nome'] ?></h1>                
                <div class="referencia"><span>Referência: <?php echo $eventoInfos['id'] ?></span></div>
                <div class="preco"><span>R$ <?php echo $eventoInfos['preco_unitario'] ?></span></div>     
                <a href="carrinho.php?id=<?php echo $eventoInfos['id']?>" class="btnFinalizar" name="btnFinalizar">Adicionar ao carrinho </a>
            </div>
        </div>    
    </div>

</body>
<?php 
    # FOOTER
    include('footer.php');
?>
</html>