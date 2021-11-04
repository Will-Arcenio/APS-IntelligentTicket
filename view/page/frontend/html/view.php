<?php

    include('../../../../Conexao/conexao.php');

    $id                        = $_GET['id'];
    $nome                      = $_GET['nome'];
    $categoria                 = $_GET['categoria'];
    $ambiente                  = $_GET['ambiente'];
    $data                      = $_GET['data'];
    $classificacao_indicativa  = $_GET['classificacao_indicativa'];
    $emite_certificado         = $_GET['emite_certificado'];
    $url                       = $_GET['url'];

    $sqlEvento   = "SELECT * FROM eventos WHERE id = '{$id}'";
    $queryEvento = mysqli_query($conexao, $sqlEvento);
    $eventoInfos = mysqli_fetch_array($queryEvento, MYSQLI_ASSOC);

    $query1 = mysqli_query($conexao, $sqlEvento);

    if ($query1) {
        header('Location: ../../frontend/view.php?id=' . $id);
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

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
        <title>Compre seu ingresso online | Bla³</title>
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
                    <h1 class="title-bread">Categoria > evento</h1>
                </div> 
            </div>
        </div>
    </div>
    <div class="container imagem-ingresso">
        <div class="conteudo col-md-6  col-xs-12">      
            <img class="img-responsive" src="../../../../skins/images/imagem01.jpg" alt="blablabla">
        </div>
        <div class="container info-ingresso">
            <div class="info-evento col-md-6 col-xs-12">
                <h1 class="nome-evento">Nome do evento</h1>                
                <div class="referencia"><span>Referência: 0123456</span></div>
                <div class="preco"><span>R$60,00</span></div>  
                <div class="qty"><input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qtd" class="input-text qty"></div>   
                <button class="btnFinalizar" type="submit" name="btnFinalizar">Adicionar ao carrinho </button>
            </div>
        </div>    
    </div>

</body>
<?php 
    # FOOTER
    include('footer.php');
?>
</html>