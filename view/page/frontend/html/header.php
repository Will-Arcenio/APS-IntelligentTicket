<?php
    @session_start();

    include('../../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM categorias ORDER BY categorias.id DESC";
    $query = mysqli_query($conexao, $sqlInstruct);
?>
        <div class="header">
            <div class="header container-fluid">
                <div class="col-md-3 col-xs-12 search-area">
                    <form class="form" role="search" name="busca" method="get" action="busca.php">
                        <div class="col-md-8 col-xs-8">
                            <input type="text" name="textbusca" class="form-control" placeholder="Digite aqui o que você precisa...">
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <button type="submit" class="busca">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="div-logo col-md-6 col-xs-12 logo-area text-center">
                    <h1 class="logo"><a href="homepage.php" title="Blablabla" class="logo"><img src="../../../../skins/images/logo.png" alt="Blablabla" width="250px"></a></h1>
                </div>
                <div class="div-logo col-md-3 col-xs-12 icons">
                    <?php
                    $userInfos = explode(' ', @$_SESSION['logged_front']['user_name']);
                    $userName  = $userInfos[0];
                    ?>
                    <div class="col-md-4 login-cad">
                        <a href="../../frontend/html/login.php" <?php if(@$_SESSION['logged_front']) { ?> title="<?php echo $userName; } ?>">
                            <i class="icon-user"></i>
                        </a>
                    </div>
                    <div class="col-md-2 cart"><a href="../../frontend/html/carrinho.php" title="Meu Carrinho"><i class="icon-cart"></i></a></div>
                    <?php
                    if (@$_SESSION['logged_front']) {
                    ?>
                        <div class="col-md-4 exit">
                            <a href="logout.php"><i class="icon-exit" title="Desconectar"></i></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div> 
        </div>
        <div class="container-fluid menu">
            <nav class="navbar-nav">                 
                <div class="navbar" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <?php
                        if (!$query) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#!"></a>
                        </li>
                        <?php
                            } else {
                                $html = '';
                                while ($categoria = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    $html = '<li class="nav-item">
                                                <a class="nav-link" href="'.$categoria['url'].'.php">'. $categoria['nome'] .'</a>
                                            </li>';
                                    echo $html;
                                }
                            }
                        ?>      
                    </ul>                  
                  </div>
                </div>
              </nav>
        </div>
    </div>