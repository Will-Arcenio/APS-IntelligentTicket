<?php
    include('../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM categorias ORDER BY categorias.id DESC";
    $query = mysqli_query($conexao, $sqlInstruct);
?>
        <div class="header">
            <div class="header container-fluid">
                <div class="col-md-3 col-xs-12 search-area">
                    <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                        <input autocomplete="off" type="search" class="form-control rounded" placeholder="Buscar">
                        <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                      </form>
                </div>
                <div class="div-logo col-md-6 col-xs-12 logo-area text-center">
                    <h1 class="logo"><a href="homepage.php" title="Blablabla" class="logo"><img src="../../../../skins/images/logo.png" alt="Blablabla" width="250px"></a></h1>
                </div>
                <div class="div-logo col-md-3 col-xs-12 icons">
                    <div class="col-md-6 login-cad"><a href="" ><i class="icon-user"></i></a></div>
                    <div class="col-md-6 cart"><a href="../../frontend/html/carrinho.php"><i class="icon-cart"></i></a></div>
                </div>
            </div> 
        </div>
        <div class="container-fluid menu">
            <nav class="navbar-nav">                 
                <div class="navbar" id="navbarSupportedContent">
                <?php
                    if (!$query) {
                ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#!"></a>
                        </li>
                    </ul>
                    <?php
                        } else {
                            $html = '';
                            while ($categoria = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                $html = '<ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!">'. $categoria['nome'] .'</a>
                                            </li>
                                        </ul>';
                                echo $html;
                            }
                        }
                    ?>
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Outro</a>
                        </li>
                        </ul>
                  </div>
                </div>
              </nav>
        </div>
    </div>