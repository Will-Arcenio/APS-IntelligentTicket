<?php
    include('../../../../Conexao/conexao.php');

    $sqlInstruct = "SELECT * FROM categorias ORDER BY categorias.id DESC";
    $query = mysqli_query($conexao, $sqlInstruct);
?>
        <div class="header">
            <div class="header container-fluid">
                <div class="col-md-3 col-xs-12 search-area">
                </div>
                <div class="div-logo col-md-6 col-xs-12 logo-area text-center">
                    <h1 class="logo"><a href="homepage.php" title="Blablabla" class="logo"><img src="../../../../skins/images/logo.png" alt="Blablabla" width="250px"></a></h1>
                </div>
            </div> 
        </div>
    </div>