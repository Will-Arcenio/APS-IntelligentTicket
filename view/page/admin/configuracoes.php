<?php
    # Inicia a sessão e valida
    session_start();
    if (!$_SESSION['painel-logged']) {
        header('Location: login.php');
    }

    include('../../../Conexao/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../../skins/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../../skins/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../skins/css/estilo-admin.css">
    <link rel="stylesheet" href="../../../skins/css/style.css">
    <title>Configurações | Painel Bla³</title>
</head>
<body class="painel-admin">
    <?php 
        # CABEÇALHO ADMIN
        include('docs/header_admin.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 lista-evento">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-back">
                            <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="icon-arrow-left2"></i> Voltar</a>
                        </div>
                    </div>
                </div>
                <form action="../../../model/admin/config_DB.php" method="POST">
                    <div class="col-md-12">
                        <button type="submit" name="salvar-btn" class="botao-save"><i class="icon-floppy-disk"></i> Salvar</button>
                    </div>
                    <div class="row">
                        <div class="msg col-md-6">
                        <?php
                            if (@$_SESSION['config_updated']) {
                                if (@$_SESSION['config_updated']['updated'] == 0) {
                        ?>
                                    <span class="erro-message">Digite um valor INTEIRO entre 0 e 100.</span>
                        <?php
                                    unset($_SESSION['config_updated']);
                                }
                            }
                        ?>

                        <?php
                            if (@$_SESSION['config_updated']) {
                                if (@$_SESSION['config_updated']['updated'] == 1) {
                        ?>
                                    <span class="success-message">Configurações atualizadas.</span>
                        <?php
                                    unset($_SESSION['config_updated']);
                                }
                            }
                        ?>
                        </div>
                    </div>

                    <?php
                        $sql   = "SELECT * FROM config ORDER BY id ASC";
                        
                        $query = mysqli_query($conexao, $sql);
                    
                        while ($config = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    
                            if ($config['nome'] == 'percentual_publico') {
                    ?>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="percentual_publico">Percentual de Público</label>
                                        <input type="text" name="percentual_publico" id="percentual_publico" class="input-number" value="<?php echo $config['valor']; ?>">
                                    </div>
                                </div>

                    <?php
                            }

                            if ($config['nome'] == 'qtd_pedidos') {
                    ?>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="qtd_pedidos">Quantidade de pedidos para Desconto</label>
                                        <input type="text" name="qtd_pedidos" id="qtd_pedidos" class="input-number" value="<?php echo $config['valor']; ?>">
                                    </div>
                                </div>
            
                    <?php
                            }

                            if ($config['nome'] == 'percentual_desconto') {
                    ?>

                                <br>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="percentual_desconto">Percentual de Desconto</label>
                                        <input type="text" name="percentual_desconto" id="percentual_desconto" class="input-number" value="<?php echo $config['valor']; ?>">
                                    </div>
                                </div>
                        
                    <?php
                            }
                        }
                    ?>

                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>