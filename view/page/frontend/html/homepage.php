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
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> 
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="../../../../skins/images/banner-principal-1.png" alt="blablabla">
          </div>      
          <div class="item">
            <img src="../../../../skins/images/banner-principal-2.png" alt="teatro blablabla">
          </div>      
          <div class="item">
            <img src="../../../../skins/images/banner-principal-3.png" alt="teatro">
          </div>
        </div>
        <!-- Left and right controls -->
        <a href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container novos-eventos">
            <div class="msg col-md-6" id="msg-here">
            <?php
                if (isset($_GET['account_create'])) {
                    if ($_GET['account_create'] == 1) {
            ?>
                        <span class="success-message">Conta criada com sucesso.</span>
            <?php
                    }
                }
            ?>
            </div>
        <div class="col-md-12 title col-xs-12">
            <h1 class="title">Novos Eventos</h1>
        </div>
        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
                <div class="item active">
                        <ul class="thumbnails">
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/dance.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/the-jazz-night.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/noite-de-trivia.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/tech-dev-virtual-expo.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                  </div><!-- /Slide1 -->                 
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
    <div class="box-eventos">
        <div class="bg-eventos">
            <span class="bg-1"></span>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-xs-12">
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <div class="box-evento-info">
                                <span>Ei! Vamos para o evento? <br> Compre o ingresso <br> conosco! <br><br> <a href="../../frontend/html/cadastro.php">CADASTRE-SE AQUI</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="img-central text-center">
                                <img class="img-responsive" src="../../../../skins/images/img-central.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="img-esq">
                                <a href="../../frontend/html/teatro.php" ><img class="img-responsive" src="../../../../skins/images/img01.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="img-dir">
                            <a href="../../frontend/html/cinema.php" ><img class="img-responsive" src="../../../../skins/images/img02.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container os-mais-vendidos">
        <div class="col-md-12 title col-xs-12">
            <h1 class="title">Os mais vendidos</h1>
        </div>
        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
                <div class="item active">
                        <ul class="thumbnails">
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/luzes-de-natal.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/menina-super-poderosa.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/moda.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="fff">
                                    <div class="thumbnail">
                                        <a href="../../frontend/html/view.php"><img src="../../../../skins/images/eventos/rock.png" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Nome do evento</h4>
                                        <p>R$60,00</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                  </div><!-- /Slide1 --> 
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