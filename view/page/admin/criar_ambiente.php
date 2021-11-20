<?php
    # Inicia a sessão e valida
    session_start();
    if (!$_SESSION['logged']) {
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
    <title>Cadastrar Ambiente | Painel Bla³</title>
</head>
<body class="painel-admin">
    <?php 
        # CABEÇALHO ADMIN
        include('docs/header_admin.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 lista-ambiente">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-back">
                            <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="icon-arrow-left2"></i> Voltar</a>
                        </div>
                    </div>
                </div>
                <form action="../../../model/admin/ambiente_create_DB.php" method="POST">
                    <?php
                        $sql   = "SELECT * FROM ambientes ORDER BY nome ASC";
                        
                        $query = mysqli_query($conexao, $sql);
                    ?>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="id">Código</label>
                            <input type="text" name="id" id="id" readonly="true" class="input-number" required="required">
                        </div>
                        <div class="col-md-10">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" size="50" required="required">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="endereco">Endereço</label>
                            <input type="text" id="endereco" name="endereco" required="required">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="qtd_publico">Qtd Público</label>
                            <input type="text" name="qtd_publico" id="qtd_publico" class="input-number" required="required">
                        </div>
                        <div class="col-md-3">
                            <label for="ambiente_fechado">Ambiente Fechado</label>
                            <select name="ambiente_fechado" id="ambiente_fechado">
                                <option value="N">Não</option>
                                <option value="S">Sim</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="botao-div">
                        <button type="submit" name="salvar" class="botao"><i class="icon-floppy-disk"></i> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>